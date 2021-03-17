<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;

class ControlUIKitScriptController extends Controller
{
    public function __invoke(): string
    {
        return <<<blade
            function _controlNumber(input, decimals, min, max, fixed) {
                let number = input.value.replace(/[^\d\.-]/g, "") * 1;

                if (min !== '' && number < min) {
                    number = min;
                }

                if (max !== '' && number > max) {
                    number = max;
                }

                input.value = +(Math.round(number + ("e+" + decimals))  + ("e-" + decimals));

                if (fixed) {
                    input.value = (input.value * 1).toFixed(decimals);
                }
            }
            blade;
    }
}
