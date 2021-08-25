<?php 

namespace Lar\Layout {

    /**
     * @method \Lar\Layout\Respond|$this do(\Closure $closure)
     * @method \Lar\Layout\Respond|$this pointer() Set cursor pointer in the parent tag
     * @method \Illuminate\Support\Collection|Respond|\Lar\Layout\Respond|$this insert($key, $value = null) Put rule alias
     * @method \Lar\Layout\Respond|$this justMerge($data)
     * @method array|Respond|RespondDoc|\Lar\Layout\Respond|$this get_macro_names()
     * @method string|\Lar\Layout\Respond|$this toHtml()
     * @method string|\Lar\Layout\Respond|$this render()
     * @method Respond|\Lar\Layout\Respond|$this glob() Access to global instance
     * @method \Lar\Layout\Respond\jQuery|\Lar\Layout\Respond|$this jq(string $selector = null) New jQuery decorator
     * @method \Lar\Layout\Respond|\Lar\Layout\Respond|$this submit() Submit parent form
     * @method \Lar\Layout\Respond|$this toast_success($text, $title = null) toast:success
     * @method \Lar\Layout\Respond|$this toast_warning($text, $title = null) toast:warning
     * @method \Lar\Layout\Respond|$this toast_info($text, $title = null) toast:info
     * @method \Lar\Layout\Respond|$this toast_error($text, $title = null) toast:error
     * @method \Lar\Layout\Respond|$this toast($type, $text, $title = null)
     * @method \Lar\Layout\Respond|$this title(string $title) doc::title
     * @method \Lar\Layout\Respond|$this redirect(string $url, $parameters = [], $absolute = true) doc::redirect
     * @method \Lar\Layout\Respond|$this location(string $url, array $params = []) doc::location
     * @method \Lar\Layout\Respond|$this route(string $route, $parameters = [], $absolute = true) doc::location
     * @method \Lar\Layout\Respond|$this back() History back
     * @method \Lar\Layout\Respond|$this reload() doc::reload
     * @method \Lar\Layout\Respond|$this scrollTo($element = "body", $ms = 1000)
     * @method \Lar\Layout\Respond|$this preventDefault()
     * @method \Lar\Layout\Respond|$this dispatch_event($event)
     * @method \Lar\Layout\Respond|$this state(string $name, $value)
     * @method \Lar\Layout\Respond|$this state_delete(string $name)
     * @method \Lar\Layout\Respond|$this console_error($data)
     * @method \Lar\Layout\Respond|$this console_info($data)
     * @method \Lar\Layout\Respond|$this console_log($data)
     * @method \Lar\Layout\Respond|$this console_warn($data)
     * @method \Lar\Layout\Respond|$this console_clear()
     * @method \Lar\Layout\Respond|$this change_link($link, array $params = [], bool $absolute = true)
     * @method Respond|\Lar\Layout\Respond|$this time_out(int $ms)
     * @method \Lar\Layout\Respond|$this vue()
     * @method \Lar\Layout\Respond|$this paginate() Macro paginate
     * @method \Lar\Layout\Respond|$this downloadExcel() Macro downloadExcel
     * @method \Lar\Layout\Respond|$this storeExcel() Macro storeExcel
     * @method \Lar\Layout\Respond|$this line_validate() Macro line_validate
     * @method \Lar\Layout\Respond|$this validate() Macro validate
     * @method \Lar\Layout\Respond|$this nestable_pluck() Macro nestable_pluck
     */
    class RespondDoc
    {
    }


}


namespace Lar\LteAdmin\Core {

    /**
     * @method void application Make extension routes (BusinessLine})
     */
    class NavigatorExtensions
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Navigate do(...$calls)
     * @method self|static|\Lar\LteAdmin\Navigate menu_header(string $title)
     * @method self|static|\Lar\LteAdmin\Navigate nav_bar_view(string $view, array $params = [], bool $prepend = false)
     * @method self|static|\Lar\LteAdmin\Navigate left_nav_bar_view(string $view, array $params = [])
     * @method self|static|\Lar\LteAdmin\Core\NavGroup group(string $title = null, $route = null, $cb = null)
     * @method self|static|\Lar\LteAdmin\Core\NavItem item(string $title = null, string $route = null, $action = null)
     * @method self|static|array get()
     * @method self|static|array getMaked()
     * @method self|static|\Lar\LteAdmin\Navigate channel($channel, $callback, $options = [])
     * @method self|static|\Lar\LteAdmin\Navigate instance()
     * @method self|static|\Lar\LteAdmin\Navigate __call($name, $arguments)
     * @method self|static|\Lar\LteAdmin\Navigate includeAfterGroup($name)
     * @method self|static|\Lar\LteAdmin\Navigate makeDefaults() Make auto default tools
     * @method self|static|\Lar\LteAdmin\Core\NavGroup lteAdministrationGroup($call) Make default administration group
     * @method self|static|\Lar\LteAdmin\Core\NavItem lteAdministrators(string $action = null) Make administrator list tool
     * @method self|static|\Lar\LteAdmin\Core\NavGroup lteAccessGroup($call) Make default access group
     * @method self|static|\Lar\LteAdmin\Core\NavItem lteRoles(string $action = null) Make roles list tool
     * @method self|static|\Lar\LteAdmin\Core\NavItem ltePermission(string $action = null) Make permissions list tool
     * @method self|static|\Lar\LteAdmin\Core\NavItem lteFunctions(string $action = null) Make functions/gates list tool
     */
    class NavigatorMethods
    {
    }


}


namespace Lar\LteAdmin\Segments {

    class ModalMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class ModalMethods
    {
    }


}
namespace Lar\LteAdmin\Segments\Tagable {

    class AlertMacroList
    {
    }


    class ButtonGroupMacroList
    {
    }


    class CardMacroList
    {
    }


    class CardBodyMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class CardBodyMethods
    {
    }


    class ColMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class ColMethods
    {
    }


    class DividerMacroList
    {
    }


    class FieldMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class FieldMethods
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Form|\Lar\LteAdmin\Segments\Tagable\FormGroup info_at($condition = null) Field Macro info_at
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Form|\Lar\LteAdmin\Segments\Tagable\FormGroup info_id($condition = null) Field Macro info_id
     */
    class FormMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class FormMethods
    {
    }


    class FormFooterMacroList
    {
    }


    class FormGroupMacroList
    {
    }


    class InfoBoxMacroList
    {
    }


    class LangMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class LangMethods
    {
    }


    class LiveMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class LiveMethods
    {
    }


    class ModalBodyMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class ModalBodyMethods
    {
    }


    class ModelInfoTableMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Editables input_switcher(...$params) Method input_switcher
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Editables input_editable(...$params) Method input_editable
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Editables textarea_editable(...$params) Method textarea_editable
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter str_limit(...$params) Method str_limit
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter admin_resource_route(...$params) Method admin_resource_route
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter admin_resource_route_edit(...$params) Method admin_resource_route_edit
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter admin_resource_route_show(...$params) Method admin_resource_route_show
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_append(...$params) Method to_append
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_prepend(...$params) Method to_prepend
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_append_link(...$params) Method to_append_link
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_prepend_link(...$params) Method to_prepend_link
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter number_format(...$params) Method number_format
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter money(...$params) Method money
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_lang(...$params) Method to_lang
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_string(...$params) Method to_string
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter has_lang(...$params) Method has_lang
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter trim(...$params) Method trim
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter carbon_format(...$params) Method carbon_format
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter carbon_time(...$params) Method carbon_time
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter explode(...$params) Method explode
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations rating(...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations password_stars(...$params) Method password_stars
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations avatar(...$params) Method avatar
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations uploaded_file(...$params) Method uploaded_file
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations copied(...$params) Method copied
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations copied_right(...$params) Method copied_right
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations badge_number(...$params) Method badge_number
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations badge(...$params) Method badge
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations pill(...$params) Method pill
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations yes_no(...$params) Method yes_no
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations on_off(...$params) Method on_off
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations fa_icon(...$params) Method fa_icon
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations badge_tags(...$params) Method badge_tags
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations color_cube(...$params) Method color_cube
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations true_data(...$params) Method true_data
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Display hide_om_mobile(...$params) Method hide_om_mobile
     */
    class ModelInfoTableMethods
    {
    }


    class ModelRelationMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class ModelRelationMethods
    {
    }


    class ModelRelationContentMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class ModelRelationContentMethods
    {
    }


    class ModelTableMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Editables input_switcher(...$params) Method input_switcher
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Editables input_editable(...$params) Method input_editable
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Editables textarea_editable(...$params) Method textarea_editable
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter str_limit(...$params) Method str_limit
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter admin_resource_route(...$params) Method admin_resource_route
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter admin_resource_route_edit(...$params) Method admin_resource_route_edit
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter admin_resource_route_show(...$params) Method admin_resource_route_show
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_append(...$params) Method to_append
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_prepend(...$params) Method to_prepend
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_append_link(...$params) Method to_append_link
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_prepend_link(...$params) Method to_prepend_link
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter number_format(...$params) Method number_format
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter money(...$params) Method money
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_lang(...$params) Method to_lang
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter to_string(...$params) Method to_string
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter has_lang(...$params) Method has_lang
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter trim(...$params) Method trim
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter carbon_format(...$params) Method carbon_format
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter carbon_time(...$params) Method carbon_time
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Formatter explode(...$params) Method explode
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations rating(...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations password_stars(...$params) Method password_stars
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations avatar(...$params) Method avatar
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations uploaded_file(...$params) Method uploaded_file
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations copied(...$params) Method copied
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations copied_right(...$params) Method copied_right
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations badge_number(...$params) Method badge_number
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations badge(...$params) Method badge
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations pill(...$params) Method pill
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations yes_no(...$params) Method yes_no
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations on_off(...$params) Method on_off
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations fa_icon(...$params) Method fa_icon
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations badge_tags(...$params) Method badge_tags
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations color_cube(...$params) Method color_cube
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Decorations true_data(...$params) Method true_data
     * @method self|static|\Lar\LteAdmin\Core\TableExtends\Display hide_om_mobile(...$params) Method hide_om_mobile
     */
    class ModelTableMethods
    {
    }


    class NestedMacroList
    {
    }


    class RowMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class RowMethods
    {
    }


    class SearchFormMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Input input(string $name, string $label, $condition = '=%') Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Email email(string $name, string $label, $condition = '=%') Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Number number(string $name, string $label, $condition = '=') Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Numeric numeric(string $name, string $label, $condition = '=') Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Amount amount(string $name, string $label, $condition = '>=') Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Switcher switcher(string $name, string $label, $condition = '=') Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\DateRange date_range(string $name, string $label, $condition = '=%') Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\DateTimeRange date_time_range(string $name, string $label, $condition = 'between') Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Date date(string $name, string $label, $condition = '>=') Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\DateTime date_time(string $name, string $label, $condition = '>=') Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Time time(string $name, string $label, $condition = '=') Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Icon icon(string $name, string $label, $condition = '=%') Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Color color(string $name, string $label, $condition = '=') Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Select select(string $name, string $label, $condition = '=') Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\MultiSelect multi_select(string $name, string $label, $condition = 'in') Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\SelectTags select_tags(string $name, string $label, $condition = 'in') Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Checks checks(string $name, string $label, $condition = 'in') Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\SearchFields\Radios radios(string $name, string $label, $condition = '=') Method radios
     */
    class SearchFormMethods
    {
    }


    class SmallBoxMacroList
    {
    }


    class TabContentMacroList
    {
    }


    /**
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Input input(string $name, string $label = null, ...$params) Method input
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Password password(string $name, string $label = null, ...$params) Method password
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Email email(string $name, string $label = null, ...$params) Method email
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Number number(string $name, string $label = null, ...$params) Method number
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Numeric numeric(string $name, string $label = null, ...$params) Method numeric
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Amount amount(string $name, string $label = null, ...$params) Method amount
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\File file(string $name, string $label = null, ...$params) Method file
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Image image(string $name, string $label = null, ...$params) Method image
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Switcher switcher(string $name, string $label = null, ...$params) Method switcher
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateRange date_range(string $name, string $label = null, ...$params) Method date_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTimeRange date_time_range(string $name, string $label = null, ...$params) Method date_time_range
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Date date(string $name, string $label = null, ...$params) Method date
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DateTime date_time(string $name, string $label = null, ...$params) Method date_time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Time time(string $name, string $label = null, ...$params) Method time
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Icon icon(string $name, string $label = null, ...$params) Method icon
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Color color(string $name, string $label = null, ...$params) Method color
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Select select(string $name, string $label = null, ...$params) Method select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\DualSelect dual_select(string $name, string $label = null, ...$params) Method dual_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MultiSelect multi_select(string $name, string $label = null, ...$params) Method multi_select
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\SelectTags select_tags(string $name, string $label = null, ...$params) Method select_tags
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Textarea textarea(string $name, string $label = null, ...$params) Method textarea
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CKEditor ckeditor(string $name, string $label = null, ...$params) Method ckeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\MDEditor mdeditor(string $name, string $label = null, ...$params) Method mdeditor
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Checks checks(string $name, string $label = null, ...$params) Method checks
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Radios radios(string $name, string $label = null, ...$params) Method radios
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\CodeMirror codemirror(string $name, string $label = null, ...$params) Method codemirror
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Info info(string $name, string $label = null, ...$params) Method info
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Rating rating(string $name, string $label = null, ...$params) Method rating
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Hidden hidden(string $name, string $label = null, ...$params) Method hidden
     * @method self|static|\Lar\LteAdmin\Segments\Tagable\Fields\Autocomplete autocomplete(string $name, string $label = null, ...$params) Method autocomplete
     */
    class TabContentMethods
    {
    }


    class TableMacroList
    {
    }


    class TabsMacroList
    {
    }


}


