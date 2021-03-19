<?php

namespace ControlUIKit;

use Illuminate\Support\Str;

class TableFilters
{
    protected $key;
    protected $module;
    protected $option;
    protected $page;
    protected $value;
    protected $trigger;
    protected $fields;

    /**
     * Filter constructor.
     * @param null $key
     * @param null $value
     */
    public function __construct($key = null, $value = null)
    {
        $this->key = $key;

        $this->option = request()->get('option');
        $this->page = request()->get('page');

        if ($value !== null) {
            $this->set($value);
        }
    }

    /**
     * Appends the value to the current session value.
     * @param $value
     */
    public function append($value)
    {
        $this->set($this->get() . $value);
    }

    /**
     * Removes all of the module session values.
     *
     * @param $module
     */
    public function resetModule($module)
    {
        session()->remove(Str::slug($module));
    }

    /**
     * Returns the current value from the session.
     *
     * @param $key
     * @return mixed
     */
    public function get($key = null)
    {
        if ($key && is_array(session($this->getKey()))) {
            return session($this->getKey())[$key];
        }

        return session($this->getKey());
    }

    /**
     * Returns boolean if the filtered set value matches value passed in.
     *
     * @param $val
     * @return bool
     */
    public function is($val)
    {
        if (! $this->filtered()) {
            return false;
        }

        if (is_array($val)) {
            return in_array($this->get(), $val);
        }

        return $this->get() === $val;
    }

    /**
     * Pushes value into session array.
     *
     * @param $val
     * @return mixed
     */
    public function push($val)
    {
        if (! $this->filtered()) {
            $this->set((is_array($val)) ? $val : [$val]);

            return $this->get();
        }

        if (is_array($this->get())) {
            $this->set(array_merge($this->get(), (is_array($val)) ? $val : [$val]));

            return $this->get();
        }

        return $this->get();
    }

    /**
     * Pops value off session array.
     *
     * @param $val
     * @return mixed
     */
    public function pop($val)
    {
        if (! $this->filtered()) {
            return null;
        }

        $arr = $this->get();
        if (is_array($arr) && array_key_exists($val, $arr)) {
            $value = $arr[$val];
            unset($arr[$val]);

            if ($arr) {
                $this->set($arr);
            } else {
                $this->remove();
            }

            return $value;
        }

        return null;
    }

    /**
     * Implode array.
     *
     * @param $delimiter
     * @return mixed
     */
    public function implode($delimiter = ',')
    {
        if (! $this->filtered() || ! is_array($this->get())) {
            return null;
        }

        return implode($delimiter, $this->get());
    }

    /**
     * Count values in array.
     *
     * @return int|null
     */
    public function count()
    {
        return $this->filtered() && is_array($this->get()) ? count($this->get()) : null;
    }

    /**
     * Returns true if active filters are in place.
     *
     * @return bool
     */
    public function activeFilters() : bool
    {
        return count(session($this->getModule())) > 0;
    }

    /**
     * Saves the specified value to the session.
     *
     * @param $value
     */
    public function set($value)
    {
        session([$this->getKey() => $value]);
    }

    /**
     * Returns true or false to determine whether a filter is in place.
     *
     * @return bool
     */
    public function filtered()
    {
        return session($this->getKey()) !== null;
    }

    /**
     * Returns true or false to determine whether there is not a filter in place.
     *
     * @return bool
     */
    public function notFiltered()
    {
        return ! $this->filtered();
    }

    /**
     * Enable checkbox mode which looks for a trigger input in the request.
     *
     * @param null $trigger
     * @return $this
     */
    public function checkbox($trigger = null)
    {
        $this->trigger = ($trigger) ? $trigger : $this->key . '_check';

        return $this;
    }

    /**
     * Updates the session based on what is in the request.
     *
     * @param $unsetMode - the value that we unset the session variable
     * @return mixed
     */
    public function request($unsetMode = null)
    {
        if ($this->trigger) {
            if (! request()->has($this->trigger)) {
                return false;
            }

            if (request()->has($this->key)) {
                $this->set(true);
            } else {
                $this->remove();
            }
        }

        if (! request()->has($this->key)) {
            return false;
        }

        $this->set(request()->get($this->key));

        if (session($this->getKey()) === $unsetMode) {
            $this->remove();
        }
    }

    /**
     * Updates the session based on what is in the request.
     * @param int $unset
     * @return mixed
     */
    public function requestInt($unset = null)
    {
        if (! request()->has($this->key)) {
            return false;
        }

        $value = request()->get($this->key);

        if ($value != $unset && ctype_digit($value)) {
            $this->set((int) $value);
        }

        if ($value === null || $value == 'undefined' || session($this->getKey()) === $unset) {
            $this->remove();
        }
    }

    /**
     * Removes the session value.
     */
    public function remove()
    {
        session()->remove($this->getKey());
    }

    /**
     * Set the module name.  Required if the 'option' is not available in the request.
     *
     * @param $module
     * @return $this
     */
    public function module($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Returns all session variables.
     *
     * @return array
     */
    public function all()
    {
        return session()->all();
    }

    private function moduleHasFilters()
    {
        return collect(session()->get($this->getModule()))
                ->forget(['orderby', 'sort', 'number'])
                ->count() !== 0;
    }

    /**
     * Reset filters for module if filter=reset is passed in the url.
     */
    public function resetFilters()
    {
        if (request()->has('filter') && request()->get('filter') == 'reset') {
            $this->remove();
        }
    }

    /**
     * Internal method for combining the module name and key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key !== '' ? $this->getModule() . '.' . $this->key : $this->getModule();
    }

    /**
     * Internal method used for setting the module name.
     *
     * @return string
     */
    public function getModule()
    {
        if ($this->module) {
            return Str::slug($this->module);
        }

        if (request()->has('page') && request()->has('option')) {
            return Str::slug(request()->get('option') . '-' . request()->get('page'));
        }

        if (request()->has('option')) {
            return Str::slug(request()->get('option'));
        }

        return 'control';
    }
}
