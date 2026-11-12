# IconInsertTags

Font Awesome Insert Tags examples: 

{{fab::facebook}}

{{fa::envelope}}

{{fas::envelope}}

{{fad::envelope}}

{{fal::envelope}}

{{fat::envelope}}

{{fasl::envelope}}

{{fasr::envelope}}

{{fass::envelope}}


All Font Awesome styles can be used: brands (fab), regular (fa), solid (fas), duotone (fad), light (fal), thin (fat), sharp-light (fasl), sharp-regular (fasr), sharp-solid (fass)

All free Font Awesome fonts are included: https://github.com/FortAwesome/Font-Awesome/tree/6.x/svgs

Other Font Awesome fonts must be located in files/layout/icons/fontawesome/svgs/

Own icons can be viewed using {{icon::icon_name}} for example for the file files/layout/icons/icon_name.svg

Own icons can also get an additional CSS class: {{icon::icon_name::my-class}}

The icon insert tag is registered with priority 100, so it also works when another bundle registers an insert tag called "icon" (RockSolid Custom Elements does since version 2.5.0). Icons that are not found in files/layout/icons/ are passed on to the RockSolid Custom Elements icon insert tag if it is installed.
