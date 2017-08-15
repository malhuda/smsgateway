/* ========================================================================
 * element.js
 * Page/renders: forms-element.html
 * Plugins used: selectize, jquery-ui, jquery-ui-timepicker-addon, inputmask, select2
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'selectize',
            'jquery-ui',
            'jquery-ui-timepicker-addon',
            'inputmask',
            'select2'
        ], factory);
    } else {
        factory();
    }
}(function () {

    $(function () {
        // custom select
        // ================================
        $('#selectize-customselect').selectize();

        // tagging
        // ================================
        $('#selectize-tagging').selectize({
            delimiter: ',',
            persist: false,
            create: function (input) {
                return {
                    value: input,
                    text: input
                };
            }
        });

        // select
        // ================================
        $('#selectize-select').selectize({
            create: true,
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            dropdownParent: 'body'
        });

        // multiple select
        // ================================
        $('#selectize-selectmultiple').selectize({
            maxItems: 3
        });

        // Contact select
        // ================================
        (function () {
            var REGEX_EMAIL = '([a-z0-9!#$%&*+/=?^_`{|}~-]+(?:[a-z0-9!#$%&*+/=?^_`{|}~-]+)*@' + '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';

            var formatName = function (item) {
                return $.trim((item.firstName || '') + ' ' + (item.lastName || ''));
            };
            // contact
            $('#selectize-contact').selectize({
                persist: false,
                maxItems: null,
                valueField: 'email',
                labelField: 'name',
                searchField: ['firstName', 'lastName', 'email'],
                sortField: [{
                    field: 'firstName',
                    direction: 'asc'
                }, {
                    field: 'lastName',
                    direction: 'asc'
                }],
                options: [{
                    email: 'nikola@tesla.com',
                    firstName: 'Nikola',
                    lastName: 'Tesla'
                }, {
                    email: 'brian@thirdroute.com',
                    firstName: 'Brian',
                    lastName: 'Reavis'
                }, {
                    email: 'pampersdry@gmail.com',
                    firstName: 'John',
                    lastName: 'Pozy'
                }],
                render: {
                    item: function (item, escape) {
                        var name = formatName(item);
                        return '<div>' +
                            (name ? '<span class="name">' + escape(name) + '</span>' : '') +
                            (item.email ? '<small class="text-muted ml10">' + escape(item.email) + '</small>' : '') +
                            '</div>';
                    },
                    option: function (item, escape) {
                        var name = formatName(item);
                        var label = name || item.email;
                        var caption = name ? item.email : null;
                        return '<div>' +
                            '<span class="text-primary">' + escape(label) + '</span><br/>' +
                            (caption ? '<small class="text-muted">' + escape(caption) + '</small>' : '') +
                            '</div>';
                    }
                },
                create: function (input) {
                    if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
                        return {
                            email: input
                        };
                    }
                    var match = input.match(new RegExp('^([^<]*)<' + REGEX_EMAIL + '>$', 'i'));
                    if (match) {
                        var name = $.trim(match[1]);
                        var postSpace = name.indexOf(' ');
                        var firstName = name.substring(0, postSpace);
                        var lastName = name.substring(postSpace + 1);

                        return {
                            email: match[2],
                            firstName: firstName,
                            lastName: lastName
                        };
                    }
                    return false;
                }
            });
        })();

        // Datepicker
        // ================================
        // default
        $('#datepicker1').datepicker();

        // date in other moonth
        $('#datepicker2').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        // button bar
        $('#datepicker3').datepicker({
            showButtonPanel: true
        });

        // display month & year
        $('#datepicker4').datepicker({
            changeMonth: true,
            changeYear: true
        });

        // select date range
        $('#datepicker-from').datepicker({
            defaultDate: '+1w',
            numberOfMonths: 2,
            onClose: function (selectedDate) {
                $('#datepicker-to').datepicker('option', 'minDate', selectedDate);
            }
        });
        $('#datepicker-to').datepicker({
            defaultDate: '+1w',
            numberOfMonths: 2,
            onClose: function (selectedDate) {
                $('#datepicker-from').datepicker('option', 'maxDate', selectedDate);
            }
        });

        // Timepicker
        // ================================
        // datepicker + timepicker
        $('#datetime-picker').datetimepicker();

        // timepicker only
        $('#time-picker').timepicker();

        // timepicker time format
        $('#time-picker-format').timepicker({
            timeFormat: 'hh:mm:ss tt'
        });

        // timepicker timezone
        $('#time-picker-timezone').timepicker({
            timeFormat: 'hh:mm:ss tt z'
        });

        // Select2
        // ================================
        // basic
        $('select[name="select2-basic"]').select2();

        // multiple
        $('select[name="select2-multiple"]').select2();

        // placeholder
        $('select[name="select2-placeholder"]').select2({
            placeholder: 'Select a State'
        });

        // Bootstrap touchspin
        // ================================
        // basic
        $('input[name="bs-touchspin-basic"]').TouchSpin();

        // vertical button
        $('input[name="bs-touchspin-vbutton"]').TouchSpin({
            verticalbuttons: true
        });

        // with postfix
        $('input[name="bs-touchspin-postfix"]').TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });

        // with prefix
        $('input[name="bs-touchspin-prefix"]').TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            prefix: '$'
        });
    });

}));