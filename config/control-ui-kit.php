<?php

use ControlUIKit\Helpers\Formatters\CurrencyFormatter;
use ControlUIKit\Helpers\Formatters\DateFormatter;
use ControlUIKit\Helpers\Formatters\DateTimeFormatter;
use ControlUIKit\Helpers\Formatters\DecimalFormatter;

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Control UI Kit are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [

        'alert' => \ControlUIKit\Components\Alerts\Alert::class,

        'button' => \ControlUIKit\Components\Buttons\Button::class,
        'logout' => \ControlUIKit\Components\Buttons\Logout::class,

        'code-block' => \ControlUIKit\Components\Code\Block::class,
        'code' => \ControlUIKit\Components\Code\Inline::class,

        'bar-chart' => \ControlUIKit\Components\Charts\Bar::class,
        'donut-chart' => \ControlUIKit\Components\Charts\Donut::class,
        'line-chart' => \ControlUIKit\Components\Charts\Line::class,
        'pie-chart' => \ControlUIKit\Components\Charts\Pie::class,
        'matrix-chart' => \ControlUIKit\Components\Charts\Matrix::class,
        'change-chart' => \ControlUIKit\Components\Charts\Change::class,

        'dropdown-divider' => \ControlUIKit\Components\Dropdowns\Divider::class,
        'dropdown-menu' => \ControlUIKit\Components\Dropdowns\Menu::class,
        'dropdown-option' => \ControlUIKit\Components\Dropdowns\Option::class,

        'error' => \ControlUIKit\Components\Forms\Error::class,
        'error-bag' => \ControlUIKit\Components\Forms\ErrorBag::class,
        'form' => \ControlUIKit\Components\Forms\Form::class,
        'label' => \ControlUIKit\Components\Forms\Label::class,
        'title' => \ControlUIKit\Components\Forms\Title::class,

        'form-field' => \ControlUIKit\Components\Forms\FormField::class,

        'field-checkbox' => \ControlUIKit\Components\Forms\Fields\CheckboxField::class,
        'field-color-picker' => \ControlUIKit\Components\Forms\Fields\ColorPickerField::class,
        'field-currency' => \ControlUIKit\Components\Forms\Fields\CurrencyField::class,
        'field-decimal' => \ControlUIKit\Components\Forms\Fields\DecimalField::class,
        'field-date' => \ControlUIKit\Components\Forms\Fields\DateField::class,
        'field-datetime' => \ControlUIKit\Components\Forms\Fields\DateTimeFields::class,
        'field-date-range' => \ControlUIKit\Components\Forms\Fields\DateRangeField::class,
        'field-email' => \ControlUIKit\Components\Forms\Fields\EmailField::class,
        'field-info' => \ControlUIKit\Components\Forms\Fields\InfoField::class,
        'field-input' => \ControlUIKit\Components\Forms\Fields\InputField::class,
        'field-number' => \ControlUIKit\Components\Forms\Fields\NumberField::class,
        'field-otc' => \ControlUIKit\Components\Forms\Fields\OneTimeCodeField::class,
        'field-password' => \ControlUIKit\Components\Forms\Fields\PasswordField::class,
        'field-percent' => \ControlUIKit\Components\Forms\Fields\PercentField::class,
        'field-radio-group' => \ControlUIKit\Components\Forms\Fields\RadioGroupField::class,
        'field-range' => \ControlUIKit\Components\Forms\Fields\RangeField::class,
        'field-royalty' => \ControlUIKit\Components\Forms\Fields\RoyaltyField::class,
        'field-search' => \ControlUIKit\Components\Forms\Fields\SearchField::class,
        'field-select' => \ControlUIKit\Components\Forms\Fields\SelectField::class,
        'field-slot' => \ControlUIKit\Components\Forms\Fields\SlotField::class,
        'field-text' => \ControlUIKit\Components\Forms\Fields\TextField::class,
        'field-time' => \ControlUIKit\Components\Forms\Fields\TimeField::class,
        'field-toggle' => \ControlUIKit\Components\Forms\Fields\ToggleField::class,
        'field-textarea' => \ControlUIKit\Components\Forms\Fields\TextareaField::class,
        'field-url' => \ControlUIKit\Components\Forms\Fields\UrlField::class,

        'input' => \ControlUIKit\Components\Forms\Inputs\Input::class,
        'input-blank' => \ControlUIKit\Components\Forms\Inputs\Blank::class,
        'input-checkbox' => \ControlUIKit\Components\Forms\Inputs\Checkbox::class,
        'input-color-picker' => \ControlUIKit\Components\Forms\Inputs\ColorPicker::class,
        'input-currency' => \ControlUIKit\Components\Forms\Inputs\Currency::class,
        'input-decimal' => \ControlUIKit\Components\Forms\Inputs\Decimal::class,
        'input-date' => \ControlUIKit\Components\Forms\Inputs\Date::class,
        'input-datetime' => \ControlUIKit\Components\Forms\Inputs\DateTime::class,
        'input-date-range' => \ControlUIKit\Components\Forms\Inputs\DateRange::class,
        'input-email' => \ControlUIKit\Components\Forms\Inputs\Email::class,
        'input-embed' => \ControlUIKit\Components\Forms\Inputs\Embed::class,
        'input-hidden' => \ControlUIKit\Components\Forms\Inputs\Hidden::class,
        'input-number' => \ControlUIKit\Components\Forms\Inputs\Number::class,
        'input-otc' => \ControlUIKit\Components\Forms\Inputs\OneTimeCode::class,
        'input-password' => \ControlUIKit\Components\Forms\Inputs\Password::class,
        'input-percent' => \ControlUIKit\Components\Forms\Inputs\Percent::class,
        'input-radio' => \ControlUIKit\Components\Forms\Inputs\Radio::class,
        'input-radio-group' => \ControlUIKit\Components\Forms\Inputs\RadioGroup::class,
        'input-range' => \ControlUIKit\Components\Forms\Inputs\Range::class,
        'input-royalty' => \ControlUIKit\Components\Forms\Inputs\Royalty::class,
        'input-search' => \ControlUIKit\Components\Forms\Inputs\Search::class,
        'input-select' => \ControlUIKit\Components\Forms\Inputs\Select::class,
        'input-text' => \ControlUIKit\Components\Forms\Inputs\Text::class,
        'input-time' => \ControlUIKit\Components\Forms\Inputs\Time::class,
        'input-toggle' => \ControlUIKit\Components\Forms\Inputs\Toggle::class,
        'input-textarea' => \ControlUIKit\Components\Forms\Inputs\Textarea::class,
        'input-url' => \ControlUIKit\Components\Forms\Inputs\Url::class,

        'layout-body' => \ControlUIKit\Components\Layouts\Body::class,
        'layout-content' => \ControlUIKit\Components\Layouts\Content::class,
        'layout-footer' => \ControlUIKit\Components\Layouts\Footer::class,
        'layout-header' => \ControlUIKit\Components\Layouts\Header::class,
        'layout-toolbar' => \ControlUIKit\Components\Layouts\Toolbar::class,

        'map-world' => \ControlUIKit\Components\Maps\World::class,
        'map-region' => \ControlUIKit\Components\Maps\Region::class,

        'map.world' => \ControlUIKit\Components\Maps\World::class,
        'map.region' => \ControlUIKit\Components\Maps\Region::class,

        'markdown' => \ControlUIKit\Components\Markdown\Markdown::class,
        'toc' => \ControlUIKit\Components\Markdown\ToC::class,

        'modal' => \ControlUIKit\Components\Modals\Modal::class,
        'modal-dialog' => \ControlUIKit\Components\Modals\Dialog::class,
        'modal-confirmation' => \ControlUIKit\Components\Modals\Confirmation::class,

        'panel' => \ControlUIKit\Components\Panels\Panel::class,
        'panel-divider' => \ControlUIKit\Components\Panels\Divider::class,
        'panel-footer' => \ControlUIKit\Components\Panels\Footer::class,
        'panel-header' => \ControlUIKit\Components\Panels\Header::class,
        'panel-section' => \ControlUIKit\Components\Panels\Section::class,

        'pill' => \ControlUIKit\Components\Pills\Pill::class,

        'table' => \ControlUIKit\Components\Tables\Table::class,
        'table-action' => \ControlUIKit\Components\Tables\Action::class,
        'table-action-options' => \ControlUIKit\Components\Tables\ActionOptions::class,
        'table-active-filter' => \ControlUIKit\Components\Tables\ActiveFilter::class,
        'table-cell' => \ControlUIKit\Components\Tables\Cell::class,
        'table-filter' => \ControlUIKit\Components\Tables\Filter::class,
        'table-filters' => \ControlUIKit\Components\Tables\Filters::class,
        'table-row' => \ControlUIKit\Components\Tables\Row::class,
        'table-heading' => \ControlUIKit\Components\Tables\Heading::class,
        'table-empty' => \ControlUIKit\Components\Tables\EmptyRow::class,
        'table-pagination' => \ControlUIKit\Components\Tables\Pagination::class,

        'tabs' => \ControlUIKit\Components\Tabs\Tabs::class,
        'tabs-heading' => \ControlUIKit\Components\Tabs\Heading::class,
        'tabs-panel' => \ControlUIKit\Components\Tabs\Panel::class,

        'text' => \ControlUIKit\Components\Text\Text::class,
        'link' => \ControlUIKit\Components\Text\Link::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Field Layout
    |--------------------------------------------------------------------------
    |
    | All form layout components are listed below along with the default to be
    | used whenever you specify a field component such as x-field-text.
    |
    */

    'field-layouts' => [

        'default' => 'responsive',

        'layouts' => [

            'inline' => \ControlUIKit\Components\Forms\Layouts\Inline::class,
            'responsive' => \ControlUIKit\Components\Forms\Layouts\Responsive::class,
            'stacked' => \ControlUIKit\Components\Forms\Layouts\Stacked::class,

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Formatters
    |--------------------------------------------------------------------------
    |
    | The UI kit can be configured to use different formatter classes.
    |
    */

    'formatters' => [
        'currency' => CurrencyFormatter::class,
        'decimal' => DecimalFormatter::class,
        'date' => DateFormatter::class,
        'datetime' => DateTimeFormatter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Icon Classes
    |--------------------------------------------------------------------------
    |
    | These classes will be applied to all icon components by default.
    |
    */

    'icon_class' => 'h-5 w-5 fill-current',

    /*
    |--------------------------------------------------------------------------
    | Icons
    |--------------------------------------------------------------------------
    |
    | Below you reference all icon components that should be loaded for your app.
    | By default all icons from Control UI Kit are loaded in. You can
    | disable or overwrite any icon component class or alias that you want.
    |
    */

    'icons' => [

        /*
         * Generic Icons
         */

        'icon-add' => \ControlUIKit\Components\Icons\Add::class,
        'icon-add-circle' => \ControlUIKit\Components\Icons\AddCircle::class,
        'icon-alert-circle' => \ControlUIKit\Components\Icons\AlertCircle::class,
        'icon-android' => \ControlUIKit\Components\Icons\Android::class,
        'icon-application' => \ControlUIKit\Components\Icons\Application::class,
        'icon-archive' => \ControlUIKit\Components\Icons\Archive::class,
        'icon-arrow-down' => \ControlUIKit\Components\Icons\ArrowDown::class,
        'icon-arrow-left' => \ControlUIKit\Components\Icons\ArrowLeft::class,
        'icon-arrow-right' => \ControlUIKit\Components\Icons\ArrowRight::class,
        'icon-arrow-up' => \ControlUIKit\Components\Icons\ArrowUp::class,
        'icon-arrow-up-down' => \ControlUIKit\Components\Icons\ArrowUpDown::class,
        'icon-at-sign' => \ControlUIKit\Components\Icons\AtSign::class,
        'icon-box' => \ControlUIKit\Components\Icons\Box::class,
        'icon-bulb' => \ControlUIKit\Components\Icons\Bulb::class,
        'icon-burger' => \ControlUIKit\Components\Icons\Burger::class,
        'icon-calendar' => \ControlUIKit\Components\Icons\Calendar::class,
        'icon-calendar-add' => \ControlUIKit\Components\Icons\CalendarAdd::class,
        'icon-camera' => \ControlUIKit\Components\Icons\Camera::class,
        'icon-caret-down' => \ControlUIKit\Components\Icons\CaretDown::class,
        'icon-caret-left' => \ControlUIKit\Components\Icons\CaretLeft::class,
        'icon-caret-right' => \ControlUIKit\Components\Icons\CaretRight::class,
        'icon-caret-up' => \ControlUIKit\Components\Icons\CaretUp::class,
        'icon-categories' => \ControlUIKit\Components\Icons\Categories::class,
        'icon-chat' => \ControlUIKit\Components\Icons\Chat::class,
        'icon-check' => \ControlUIKit\Components\Icons\Check::class,
        'icon-check-circle' => \ControlUIKit\Components\Icons\CheckCircle::class,
        'icon-chevron-down' => \ControlUIKit\Components\Icons\ChevronDown::class,
        'icon-chevron-left' => \ControlUIKit\Components\Icons\ChevronLeft::class,
        'icon-chevron-right' => \ControlUIKit\Components\Icons\ChevronRight::class,
        'icon-chevron-up' => \ControlUIKit\Components\Icons\ChevronUp::class,
        'icon-clock' => \ControlUIKit\Components\Icons\Clock::class,
        'icon-close' => \ControlUIKit\Components\Icons\Close::class,
        'icon-close-circle' => \ControlUIKit\Components\Icons\CloseCircle::class,
        'icon-cog' => \ControlUIKit\Components\Icons\Cog::class,
        'icon-cog-box' => \ControlUIKit\Components\Icons\CogBox::class,
        'icon-cog-play' => \ControlUIKit\Components\Icons\CogPlay::class,
        'icon-collapse' => \ControlUIKit\Components\Icons\Collapse::class,
        'icon-contact' => \ControlUIKit\Components\Icons\Contact::class,
        'icon-copy' => \ControlUIKit\Components\Icons\Copy::class,
        'icon-credit-card' => \ControlUIKit\Components\Icons\CreditCard::class,
        'icon-credit-card-download' => \ControlUIKit\Components\Icons\CreditCardDownload::class,
        'icon-delete' => \ControlUIKit\Components\Icons\Delete::class,
        'icon-desktop' => \ControlUIKit\Components\Icons\Desktop::class,
        'icon-disc' => \ControlUIKit\Components\Icons\Disc::class,
        'icon-dj' => \ControlUIKit\Components\Icons\Dj::class,
        'icon-document' => \ControlUIKit\Components\Icons\Document::class,
        'icon-document-download' => \ControlUIKit\Components\Icons\DocumentDownload::class,
        'icon-document-settings' => \ControlUIKit\Components\Icons\DocumentSettings::class,
        'icon-document-upload' => \ControlUIKit\Components\Icons\DocumentUpload::class,
        'icon-dot' => \ControlUIKit\Components\Icons\Dot::class,
        'icon-download' => \ControlUIKit\Components\Icons\Download::class,
        'icon-draft' => \ControlUIKit\Components\Icons\Draft::class,
        'icon-drag' => \ControlUIKit\Components\Icons\Drag::class,
        'icon-palette' => \ControlUIKit\Components\Icons\Palette::class,
        'icon-edit' => \ControlUIKit\Components\Icons\Edit::class,
        'icon-email' => \ControlUIKit\Components\Icons\Email::class,
        'icon-equalizer' => \ControlUIKit\Components\Icons\Equalizer::class,
        'icon-equalizer-2' => \ControlUIKit\Components\Icons\Equalizer2::class,
        'icon-event' => \ControlUIKit\Components\Icons\Event::class,
        'icon-event-add' => \ControlUIKit\Components\Icons\EventAdd::class,
        'icon-exclamation' => \ControlUIKit\Components\Icons\Exclamation::class,
        'icon-expand' => \ControlUIKit\Components\Icons\Expand::class,
        'icon-eye' => \ControlUIKit\Components\Icons\Eye::class,
        'icon-file-download' => \ControlUIKit\Components\Icons\FileDownload::class,
        'icon-file-upload' => \ControlUIKit\Components\Icons\FileUpload::class,
        'icon-filter' => \ControlUIKit\Components\Icons\Filter::class,
        'icon-flag' => \ControlUIKit\Components\Icons\Flag::class,
        'icon-folder' => \ControlUIKit\Components\Icons\Folder::class,
        'icon-fullscreen' => \ControlUIKit\Components\Icons\Fullscreen::class,
        'icon-globe' => \ControlUIKit\Components\Icons\Globe::class,
        'icon-graph-bar' => \ControlUIKit\Components\Icons\GraphBar::class,
        'icon-graph-pie' => \ControlUIKit\Components\Icons\GraphPie::class,
        'icon-grid' => \ControlUIKit\Components\Icons\Grid::class,
        'icon-headphones' => \ControlUIKit\Components\Icons\Headphones::class,
        'icon-imac' => \ControlUIKit\Components\Icons\Imac::class,
        'icon-info' => \ControlUIKit\Components\Icons\Info::class,
        'icon-info-circle' => \ControlUIKit\Components\Icons\InfoCircle::class,
        'icon-invisible' => \ControlUIKit\Components\Icons\Invisible::class,
        'icon-ipad' => \ControlUIKit\Components\Icons\Ipad::class,
        'icon-library' => \ControlUIKit\Components\Icons\Library::class,
        'icon-link' => \ControlUIKit\Components\Icons\Link::class,
        'icon-link-add' => \ControlUIKit\Components\Icons\LinkAdd::class,
        'icon-listing' => \ControlUIKit\Components\Icons\Listing::class,
        'icon-lock' => \ControlUIKit\Components\Icons\Lock::class,
        'icon-log-out' => \ControlUIKit\Components\Icons\LogOut::class,
        'icon-maintenance' => \ControlUIKit\Components\Icons\Maintenance::class,
        'icon-message' => \ControlUIKit\Components\Icons\Message::class,
        'icon-microphone' => \ControlUIKit\Components\Icons\Microphone::class,
        'icon-mobile' => \ControlUIKit\Components\Icons\Mobile::class,
        'icon-money' => \ControlUIKit\Components\Icons\Money::class,
        'icon-moon' => \ControlUIKit\Components\Icons\Moon::class,
        'icon-music-note' => \ControlUIKit\Components\Icons\MusicNote::class,
        'icon-music-note-double' => \ControlUIKit\Components\Icons\MusicNoteDouble::class,
        'icon-newspaper' => \ControlUIKit\Components\Icons\Newspaper::class,
        'icon-next' => \ControlUIKit\Components\Icons\Next::class,
        'icon-next-filled' => \ControlUIKit\Components\Icons\NextFilled::class,
        'icon-notifications' => \ControlUIKit\Components\Icons\Notifications::class,
        'icon-notifications-active' => \ControlUIKit\Components\Icons\NotificationsActive::class,
        'icon-options' => \ControlUIKit\Components\Icons\Options::class,
        'icon-pause' => \ControlUIKit\Components\Icons\Pause::class,
        'icon-pause-filled' => \ControlUIKit\Components\Icons\PauseFilled::class,
        'icon-percent' => \ControlUIKit\Components\Icons\Percent::class,
        'icon-pictures' => \ControlUIKit\Components\Icons\Pictures::class,
        'icon-play' => \ControlUIKit\Components\Icons\Play::class,
        'icon-play-filled' => \ControlUIKit\Components\Icons\PlayFilled::class,
        'icon-preorder' => \ControlUIKit\Components\Icons\Preorder::class,
        'icon-previous' => \ControlUIKit\Components\Icons\Previous::class,
        'icon-previous-filled' => \ControlUIKit\Components\Icons\PreviousFilled::class,
        'icon-question' => \ControlUIKit\Components\Icons\Question::class,
        'icon-record' => \ControlUIKit\Components\Icons\Record::class,
        'icon-reload' => \ControlUIKit\Components\Icons\Reload::class,
        'icon-remove' => \ControlUIKit\Components\Icons\Remove::class,
        'icon-save' => \ControlUIKit\Components\Icons\Save::class,
        'icon-search' => \ControlUIKit\Components\Icons\Search::class,
        'icon-search-cog' => \ControlUIKit\Components\Icons\SearchCog::class,
        'icon-shield-cross' => \ControlUIKit\Components\Icons\ShieldCross::class,
        'icon-spinner' => \ControlUIKit\Components\Icons\Spinner::class,
        'icon-star' => \ControlUIKit\Components\Icons\Star::class,
        'icon-star-filled' => \ControlUIKit\Components\Icons\StarFilled::class,
        'icon-status-danger' => \ControlUIKit\Components\Icons\StatusDanger::class,
        'icon-status-info' => \ControlUIKit\Components\Icons\StatusInfo::class,
        'icon-status-success' => \ControlUIKit\Components\Icons\StatusSuccess::class,
        'icon-stop' => \ControlUIKit\Components\Icons\Stop::class,
        'icon-subtract' => \ControlUIKit\Components\Icons\Subtract::class,
        'icon-sun' => \ControlUIKit\Components\Icons\Sun::class,
        'icon-support-person' => \ControlUIKit\Components\Icons\SupportPerson::class,
        'icon-tag' => \ControlUIKit\Components\Icons\Tag::class,
        'icon-tape' => \ControlUIKit\Components\Icons\Tape::class,
        'icon-thumb-down' => \ControlUIKit\Components\Icons\ThumbDown::class,
        'icon-thumb-up' => \ControlUIKit\Components\Icons\ThumbUp::class,
        'icon-track' => \ControlUIKit\Components\Icons\Track::class,
        'icon-track-add' => \ControlUIKit\Components\Icons\TrackAdd::class,
        'icon-trash' => \ControlUIKit\Components\Icons\Trash::class,
        'icon-trend-down' => \ControlUIKit\Components\Icons\TrendDown::class,
        'icon-trend-up' => \ControlUIKit\Components\Icons\TrendUp::class,
        'icon-user' => \ControlUIKit\Components\Icons\User::class,
        'icon-user-add' => \ControlUIKit\Components\Icons\UserAdd::class,
        'icon-user-download' => \ControlUIKit\Components\Icons\UserDownload::class,
        'icon-user-upload' => \ControlUIKit\Components\Icons\UserUpload::class,
        'icon-users' => \ControlUIKit\Components\Icons\Users::class,
        'icon-warning' => \ControlUIKit\Components\Icons\Warning::class,
        'icon-website' => \ControlUIKit\Components\Icons\Website::class,
        'icon-zoom-in' => \ControlUIKit\Components\Icons\ZoomIn::class,
        'icon-zoom-out' => \ControlUIKit\Components\Icons\ZoomOut::class,

        /*
         * Logo Icons (Socials - first)
         */

        'logo-amazon' => \ControlUIKit\Components\Icons\Logo\Amazon::class,
        'logo-anghami' => \ControlUIKit\Components\Icons\Logo\Anghami::class,
        'logo-apple' => \ControlUIKit\Components\Icons\Logo\Apple::class,
        'logo-beatport' => \ControlUIKit\Components\Icons\Logo\Beatport::class,
        'logo-boomplay' => \ControlUIKit\Components\Icons\Logo\Boomplay::class,
        'logo-deezer' => \ControlUIKit\Components\Icons\Logo\Deezer::class,
        'logo-facebook' => \ControlUIKit\Components\Icons\Logo\Facebook::class,
        'logo-google-play' => \ControlUIKit\Components\Icons\Logo\GooglePlay::class,
        'logo-hardstyle' => \ControlUIKit\Components\Icons\Logo\Hardstyle::class,
        'logo-instagram' => \ControlUIKit\Components\Icons\Logo\Instagram::class,
        'logo-juno' => \ControlUIKit\Components\Icons\Logo\Juno::class,
        'logo-pandora' => \ControlUIKit\Components\Icons\Logo\Pandora::class,
        'logo-paypal' => \ControlUIKit\Components\Icons\Logo\Paypal::class,
        'logo-paypal-2' => \ControlUIKit\Components\Icons\Logo\Paypal2::class,
        'logo-shazam' => \ControlUIKit\Components\Icons\Logo\Shazam::class,
        'logo-soundcloud' => \ControlUIKit\Components\Icons\Logo\Soundcloud::class,
        'logo-spotify' => \ControlUIKit\Components\Icons\Logo\Spotify::class,
        'logo-stripe' => \ControlUIKit\Components\Icons\Logo\Stripe::class,
        'logo-tiktok' => \ControlUIKit\Components\Icons\Logo\TikTok::class,
        'logo-toolbox' => \ControlUIKit\Components\Icons\Logo\Toolbox::class,
        'logo-traxsource' => \ControlUIKit\Components\Icons\Logo\Traxsource::class,
        'logo-uma' => \ControlUIKit\Components\Icons\Logo\Uma::class,
        'logo-vk' => \ControlUIKit\Components\Icons\Logo\Vk::class,
        'logo-wechat' => \ControlUIKit\Components\Icons\Logo\WeChat::class,
        'logo-whatsapp' => \ControlUIKit\Components\Icons\Logo\Whatsapp::class,
        'logo-x' => \ControlUIKit\Components\Icons\Logo\X::class,
        'logo-youtube' => \ControlUIKit\Components\Icons\Logo\Youtube::class,


        /*
         * File Type Icons
         */

        'file-aac' => \ControlUIKit\Components\Icons\File\Aac::class,
        'file-aif' => \ControlUIKit\Components\Icons\File\Aif::class,
        'file-avi' => \ControlUIKit\Components\Icons\File\Avi::class,
        'file-bmp' => \ControlUIKit\Components\Icons\File\Bmp::class,
        'file-csv' => \ControlUIKit\Components\Icons\File\Csv::class,
        'file-dat' => \ControlUIKit\Components\Icons\File\Dat::class,
        'file-doc' => \ControlUIKit\Components\Icons\File\Doc::class,
        'file-docx' => \ControlUIKit\Components\Icons\File\Docx::class,
        'file-eps' => \ControlUIKit\Components\Icons\File\Eps::class,
        'file-flv' => \ControlUIKit\Components\Icons\File\Flv::class,
        'file-gif' => \ControlUIKit\Components\Icons\File\Gif::class,
        'file-html' => \ControlUIKit\Components\Icons\File\Html::class,
        'file-iso' => \ControlUIKit\Components\Icons\File\Iso::class,
        'file-jpg' => \ControlUIKit\Components\Icons\File\Jpg::class,
        'file-js' => \ControlUIKit\Components\Icons\File\Js::class,
        'file-key' => \ControlUIKit\Components\Icons\File\Key::class,
        'file-m4v' => \ControlUIKit\Components\Icons\File\M4v::class,
        'file-mid' => \ControlUIKit\Components\Icons\File\Mid::class,
        'file-mov' => \ControlUIKit\Components\Icons\File\Mov::class,
        'file-mp3' => \ControlUIKit\Components\Icons\File\Mp3::class,
        'file-mp4' => \ControlUIKit\Components\Icons\File\Mp4::class,
        'file-mpg' => \ControlUIKit\Components\Icons\File\Mpg::class,
        'file-pdf' => \ControlUIKit\Components\Icons\File\Pdf::class,
        'file-php' => \ControlUIKit\Components\Icons\File\Php::class,
        'file-png' => \ControlUIKit\Components\Icons\File\Png::class,
        'file-ppt' => \ControlUIKit\Components\Icons\File\Ppt::class,
        'file-psd' => \ControlUIKit\Components\Icons\File\Psd::class,
        'file-py' => \ControlUIKit\Components\Icons\File\Py::class,
        'file-qt' => \ControlUIKit\Components\Icons\File\Qt::class,
        'file-rar' => \ControlUIKit\Components\Icons\File\Rar::class,
        'file-rtf' => \ControlUIKit\Components\Icons\File\Rtf::class,
        'file-sql' => \ControlUIKit\Components\Icons\File\Sql::class,
        'file-svg' => \ControlUIKit\Components\Icons\File\Svg::class,
        'file-tiff' => \ControlUIKit\Components\Icons\File\Tiff::class,
        'file-tsv' => \ControlUIKit\Components\Icons\File\Tsv::class,
        'file-ttf' => \ControlUIKit\Components\Icons\File\Ttf::class,
        'file-txt' => \ControlUIKit\Components\Icons\File\Txt::class,
        'file-wav' => \ControlUIKit\Components\Icons\File\Wav::class,
        'file-xls' => \ControlUIKit\Components\Icons\File\Xls::class,
        'file-xlsx' => \ControlUIKit\Components\Icons\File\Xlsx::class,
        'file-xml' => \ControlUIKit\Components\Icons\File\Xml::class,
        'file-zip' => \ControlUIKit\Components\Icons\File\Zip::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Language Files
    |--------------------------------------------------------------------------
    |
    | The UI kit can be configured to use language files.
    |
    */

    'use_language_files' => false,

    /*
    |--------------------------------------------------------------------------
    | User Timezone Field
    |--------------------------------------------------------------------------
    |
    | The timezone of the logged-in user. If this differs from
    | app.timezone then dates will be adjusted accordingly.
    |
    */

    'user_timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Components Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all Control UI Kit components.
    | The default value is empty meaning components appear like they are
    | regular components in your app.
    |
    | <x-panel />
    |
    | If you need to avoid collision with local components or those from other
    | libraries then setting this prefix will prefix all Control UI Kit
    | components. If set with "ui", for example, you can reference components like:
    |
    | <x-ui-panel />
    |
    */

    'prefix' => '',

    'docs-url' => 'https://ui-kit.labelworx.dev/'

];
