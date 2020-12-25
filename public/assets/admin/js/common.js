/* ABHISHEK TYAGI 19-12-2020 */

function generateSlugOnInput(from, to) {
    $('#' + from).on('input', function () {
        $('#' + to).val('');
        $('#' + to).val($('#' + from).val().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, ''));
    });
}
