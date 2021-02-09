<?php

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

        'button.base' => \ControlUIKit\Components\Buttons\Base::class,
        'button.brand' => \ControlUIKit\Components\Buttons\Brand::class,
        'button' => \ControlUIKit\Components\Buttons\Button::class,
        'button.muted' => \ControlUIKit\Components\Buttons\Muted::class,

        'code.block' => \ControlUIKit\Components\Code\Block::class,
        'code' => \ControlUIKit\Components\Code\Inline::class,

        'dropdown.divider' => \ControlUIKit\Components\Dropdowns\Divider::class,
        'dropdown.menu' => \ControlUIKit\Components\Dropdowns\Menu::class,
        'dropdown.option' => \ControlUIKit\Components\Dropdowns\Option::class,

        'form' => \ControlUIKit\Components\Forms\Form::class,
        'label' => \ControlUIKit\Components\Forms\Label::class,

        'legend' => \ControlUIKit\Components\Forms\Legend::class,
        'form.errors' => \ControlUIKit\Components\Forms\Alerts\ErrorBag::class,

        'field.number' => \ControlUIKit\Components\Forms\Fields\Number::class,
        'field.text' => \ControlUIKit\Components\Forms\Fields\Text::class,

        'input.checkbox' => \ControlUIKit\Components\Forms\Inputs\Checkbox::class,
        'input.hidden' => \ControlUIKit\Components\Forms\Inputs\Hidden::class,
        'input.number' => \ControlUIKit\Components\Forms\Inputs\Number::class,
        'input.percent' => \ControlUIKit\Components\Forms\Inputs\Percentage::class,
        'input.radio' => \ControlUIKit\Components\Forms\Inputs\Radio::class,
        'input.search' => \ControlUIKit\Components\Forms\Inputs\Search::class,
        'input.select' => \ControlUIKit\Components\Forms\Inputs\Select::class,
        'input.text' => \ControlUIKit\Components\Forms\Inputs\Text::class,
        'input.toggle' => \ControlUIKit\Components\Forms\Inputs\Toggle::class,

        'layout.body' => \ControlUIKit\Components\Layouts\Body::class,
        'layout.footer' => \ControlUIKit\Components\Layouts\Footer::class,
        'layout.header' => \ControlUIKit\Components\Layouts\Header::class,

        'form.layouts.inline' => \ControlUIKit\Components\Forms\Layouts\Inline::class,

        'modal' => \ControlUIKit\Components\Modals\Modal::class,
        'modal.dialog' => \ControlUIKit\Components\Modals\Dialog::class,
        'modal.confirmation' => \ControlUIKit\Components\Modals\Confirmation::class,

        'panel' => \ControlUIKit\Components\Panels\Panel::class,
        'panel.divider' => \ControlUIKit\Components\Panels\Divider::class,
        'panel.title' => \ControlUIKit\Components\Panels\Title::class,

        'table' => \ControlUIKit\Components\Tables\Table::class,
        'table.cell' => \ControlUIKit\Components\Tables\Cell::class,
        'table.row' => \ControlUIKit\Components\Tables\Row::class,
        'table.heading' => \ControlUIKit\Components\Tables\Heading::class,
        'table.empty' => \ControlUIKit\Components\Tables\EmptyRow::class,

        'tabs' => \ControlUIKit\Components\Tabs\Tabs::class,
        'tabs.heading' => \ControlUIKit\Components\Tabs\Heading::class,
        'tabs.panel' => \ControlUIKit\Components\Tabs\Panel::class,

    ],

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

        'icon.add' => \ControlUIKit\Components\Icons\Add::class,
        'icon.add-circle' => \ControlUIKit\Components\Icons\AddCircle::class,
        'icon.android' => \ControlUIKit\Components\Icons\Android::class,
        'icon.application' => \ControlUIKit\Components\Icons\Application::class,
        'icon.archive' => \ControlUIKit\Components\Icons\Archive::class,
        'icon.arrow-down' => \ControlUIKit\Components\Icons\ArrowDown::class,
        'icon.arrow-left' => \ControlUIKit\Components\Icons\ArrowLeft::class,
        'icon.arrow-right' => \ControlUIKit\Components\Icons\ArrowRight::class,
        'icon.arrow-up' => \ControlUIKit\Components\Icons\ArrowUp::class,
        'icon.at-sign' => \ControlUIKit\Components\Icons\AtSign::class,
        'icon.box' => \ControlUIKit\Components\Icons\Box::class,
        'icon.bulb' => \ControlUIKit\Components\Icons\Bulb::class,
        'icon.burger' => \ControlUIKit\Components\Icons\Burger::class,
        'icon.calendar' => \ControlUIKit\Components\Icons\Calendar::class,
        'icon.calendar-add' => \ControlUIKit\Components\Icons\CalendarAdd::class,
        'icon.camera' => \ControlUIKit\Components\Icons\Camera::class,
        'icon.caret-down' => \ControlUIKit\Components\Icons\CaretDown::class,
        'icon.caret-left' => \ControlUIKit\Components\Icons\CaretLeft::class,
        'icon.caret-right' => \ControlUIKit\Components\Icons\CaretRight::class,
        'icon.caret-up' => \ControlUIKit\Components\Icons\CaretUp::class,
        'icon.categories' => \ControlUIKit\Components\Icons\Categories::class,
        'icon.chat' => \ControlUIKit\Components\Icons\Chat::class,
        'icon.check-circle' => \ControlUIKit\Components\Icons\CheckCircle::class,
        'icon.check' => \ControlUIKit\Components\Icons\Check::class,
        'icon.chevron-down' => \ControlUIKit\Components\Icons\ChevronDown::class,
        'icon.chevron-left' => \ControlUIKit\Components\Icons\ChevronLeft::class,
        'icon.chevron-right' => \ControlUIKit\Components\Icons\ChevronRight::class,
        'icon.chevron-up' => \ControlUIKit\Components\Icons\ChevronUp::class,
        'icon.clock' => \ControlUIKit\Components\Icons\Clock::class,
        'icon.close-circle' => \ControlUIKit\Components\Icons\CloseCircle::class,
        'icon.close' => \ControlUIKit\Components\Icons\Close::class,
        'icon.cog-play' => \ControlUIKit\Components\Icons\CogPlay::class,
        'icon.cog' => \ControlUIKit\Components\Icons\Cog::class,
        'icon.cog-box' => \ControlUIKit\Components\Icons\CogBox::class,
        'icon.collapse' => \ControlUIKit\Components\Icons\Collapse::class,
        'icon.contact' => \ControlUIKit\Components\Icons\Contact::class,
        'icon.copy' => \ControlUIKit\Components\Icons\Copy::class,
        'icon.credit-card-download' => \ControlUIKit\Components\Icons\CreditCardDownload::class,
        'icon.credit-card' => \ControlUIKit\Components\Icons\CreditCard::class,
        'icon.delete' => \ControlUIKit\Components\Icons\Delete::class,
        'icon.desktop' => \ControlUIKit\Components\Icons\Desktop::class,
        'icon.dj' => \ControlUIKit\Components\Icons\Dj::class,
        'icon.document-download' => \ControlUIKit\Components\Icons\DocumentDownload::class,
        'icon.document-settings' => \ControlUIKit\Components\Icons\DocumentSettings::class,
        'icon.document-upload' => \ControlUIKit\Components\Icons\DocumentUpload::class,
        'icon.document' => \ControlUIKit\Components\Icons\Document::class,
        'icon.dot' => \ControlUIKit\Components\Icons\Dot::class,
        'icon.download' => \ControlUIKit\Components\Icons\Download::class,
        'icon.draft' => \ControlUIKit\Components\Icons\Draft::class,
        'icon.drag' => \ControlUIKit\Components\Icons\Drag::class,
        'icon.edit' => \ControlUIKit\Components\Icons\Edit::class,
        'icon.email' => \ControlUIKit\Components\Icons\Email::class,
        'icon.equalizer-2' => \ControlUIKit\Components\Icons\Equalizer2::class,
        'icon.equalizer' => \ControlUIKit\Components\Icons\Equalizer::class,
        'icon.event-add' => \ControlUIKit\Components\Icons\EventAdd::class,
        'icon.exclamation' => \ControlUIKit\Components\Icons\Exclamation::class,
        'icon.expand' => \ControlUIKit\Components\Icons\Expand::class,
        'icon.eye' => \ControlUIKit\Components\Icons\Eye::class,
        'icon.file-download' => \ControlUIKit\Components\Icons\FileDownload::class,
        'icon.file-upload' => \ControlUIKit\Components\Icons\FileUpload::class,
        'icon.filter' => \ControlUIKit\Components\Icons\Filter::class,
        'icon.flag' => \ControlUIKit\Components\Icons\Flag::class,
        'icon.fullscreen' => \ControlUIKit\Components\Icons\Fullscreen::class,
        'icon.globe' => \ControlUIKit\Components\Icons\Globe::class,
        'icon.graph-bar' => \ControlUIKit\Components\Icons\GraphBar::class,
        'icon.graph-pie' => \ControlUIKit\Components\Icons\GraphPie::class,
        'icon.grid' => \ControlUIKit\Components\Icons\Grid::class,
        'icon.headphones' => \ControlUIKit\Components\Icons\Headphones::class,
        'icon.imac' => \ControlUIKit\Components\Icons\Imac::class,
        'icon.info-circle' => \ControlUIKit\Components\Icons\InfoCircle::class,
        'icon.info' => \ControlUIKit\Components\Icons\Info::class,
        'icon.invisible' => \ControlUIKit\Components\Icons\Invisible::class,
        'icon.ipad' => \ControlUIKit\Components\Icons\Ipad::class,
        'icon.library' => \ControlUIKit\Components\Icons\Library::class,
        'icon.link' => \ControlUIKit\Components\Icons\Link::class,
        'icon.listing' => \ControlUIKit\Components\Icons\Listing::class,
        'icon.lock' => \ControlUIKit\Components\Icons\Lock::class,
        'icon.log-out' => \ControlUIKit\Components\Icons\LogOut::class,
        'icon.maintenance' => \ControlUIKit\Components\Icons\Maintenance::class,
        'icon.message' => \ControlUIKit\Components\Icons\Message::class,
        'icon.microphone' => \ControlUIKit\Components\Icons\Microphone::class,
        'icon.mobile' => \ControlUIKit\Components\Icons\Mobile::class,
        'icon.money' => \ControlUIKit\Components\Icons\Money::class,
        'icon.music-note-double' => \ControlUIKit\Components\Icons\MusicNoteDouble::class,
        'icon.music-note' => \ControlUIKit\Components\Icons\MusicNote::class,
        'icon.newspaper' => \ControlUIKit\Components\Icons\Newspaper::class,
        'icon.notifications-active' => \ControlUIKit\Components\Icons\NotificationsActive::class,
        'icon.notifications' => \ControlUIKit\Components\Icons\Notifications::class,
        'icon.options' => \ControlUIKit\Components\Icons\Options::class,
        'icon.pause-filled' => \ControlUIKit\Components\Icons\PauseFilled::class,
        'icon.pause' => \ControlUIKit\Components\Icons\Pause::class,
        'icon.paypal-2' => \ControlUIKit\Components\Icons\Paypal2::class,
        'icon.paypal' => \ControlUIKit\Components\Icons\Paypal::class,
        'icon.pictures' => \ControlUIKit\Components\Icons\Pictures::class,
        'icon.play-filled' => \ControlUIKit\Components\Icons\PlayFilled::class,
        'icon.play' => \ControlUIKit\Components\Icons\Play::class,
        'icon.preorder' => \ControlUIKit\Components\Icons\Preorder::class,
        'icon.question' => \ControlUIKit\Components\Icons\Question::class,
        'icon.record' => \ControlUIKit\Components\Icons\Record::class,
        'icon.reload' => \ControlUIKit\Components\Icons\Reload::class,
        'icon.remove' => \ControlUIKit\Components\Icons\Remove::class,
        'icon.save' => \ControlUIKit\Components\Icons\Save::class,
        'icon.search' => \ControlUIKit\Components\Icons\Search::class,
        'icon.shield-cross' => \ControlUIKit\Components\Icons\ShieldCross::class,
        'icon.star-filled' => \ControlUIKit\Components\Icons\StarFilled::class,
        'icon.star' => \ControlUIKit\Components\Icons\Star::class,
        'icon.status-danger' => \ControlUIKit\Components\Icons\StatusDanger::class,
        'icon.status-info' => \ControlUIKit\Components\Icons\StatusInfo::class,
        'icon.status-success' => \ControlUIKit\Components\Icons\StatusSuccess::class,
        'icon.stripe' => \ControlUIKit\Components\Icons\Stripe::class,
        'icon.subtract' => \ControlUIKit\Components\Icons\Subtract::class,
        'icon.support-person' => \ControlUIKit\Components\Icons\SupportPerson::class,
        'icon.tag' => \ControlUIKit\Components\Icons\Tag::class,
        'icon.tape' => \ControlUIKit\Components\Icons\Tape::class,
        'icon.track-add' => \ControlUIKit\Components\Icons\TrackAdd::class,
        'icon.track' => \ControlUIKit\Components\Icons\Track::class,
        'icon.trash' => \ControlUIKit\Components\Icons\Trash::class,
        'icon.trend-down' => \ControlUIKit\Components\Icons\TrendDown::class,
        'icon.trend-up' => \ControlUIKit\Components\Icons\TrendUp::class,
        'icon.user-add' => \ControlUIKit\Components\Icons\UserAdd::class,
        'icon.user-download' => \ControlUIKit\Components\Icons\UserDownload::class,
        'icon.user-upload' => \ControlUIKit\Components\Icons\UserUpload::class,
        'icon.user' => \ControlUIKit\Components\Icons\User::class,
        'icon.users' => \ControlUIKit\Components\Icons\Users::class,
        'icon.warning' => \ControlUIKit\Components\Icons\Warning::class,
        'icon.website' => \ControlUIKit\Components\Icons\Website::class,
        'icon.zoom-in' => \ControlUIKit\Components\Icons\ZoomIn::class,
        'icon.zoom-out' => \ControlUIKit\Components\Icons\ZoomOut::class,


    ],

    'icon_class' => 'h-5 w-5 fill-current',

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

];
