/**
 * Listen to when we change the value of one field : area or department
 */
$(document).on('change', '#home_area', '#home_department', function () {
    // Get the field modified
    let $field = $(this)
    // Define the area field
    let $areaField = $('#home_area')
    console.log($field)
    // Get the closest form
    let $form = $field.closest('form')
    // Replace department by city + replace area by department
    let target = '#' + $field.attr('id').replace('department', 'city').replace('area', 'department')
    // Prepare the data to send
    let data = {}
    /**
     * Key = Value 
     * Field's name on which we clicked on : $field.attr('name')
     * Field's value on which we clicked on : $field.val()
     */
    data[$areaField.attr('name')] = $areaField.val()
    data[$field.attr('name')] = $field.val()
    /**
     * Give the information to the system
     * URL : $form.attr('action')
     * data : data
     * action to do when it get the information
     */
    $.post($form.attr('action'), data).then(function (data) {
        let $input = $(data).find(target)
        $(target).replaceWith($input)
    })

})

