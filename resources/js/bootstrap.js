import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.$ = require('jquery');

$(document).ready(function () {
    const sidebar = $('#sidebar');
    const sidebarItem = $('.sidebar-item')
    // Add click event listener to the document
    $(document).on('click', function (event) {
        // Check if the clicked element is not a part of the sidebar or its items
        if (!sidebarItem.is(event.target) && sidebarItem.has(event.target).length === 0) {
            // Remove the 'sidebar-active' class from the sidebar
            sidebar.removeClass('sidebar-active');
        }
    });

    // Add a click event listener to the burger button
    $('#burger').on('click', function (event) {
        // Stop event propagation to prevent the document click event from firing
        event.stopPropagation();

        // Toggle the 'sidebar-active' class on the sidebar
        sidebar.toggleClass('sidebar-active');
    });

    // Prevent closing the sidebar when clicking on .sidebar-item or its children
    sidebar.on('click', '.sidebar-item', function (event) {
        event.stopPropagation();
    });

    // $('#append').click(function(){
    //     const newRow = `
    //     <div class="new-activity-item">
    //                         @include('components.global.input.standard', ['placeholder' => __('activity'), 'name' => 'activities[1][title]'])
    //     @include('components.global.input.standard', ['placeholder' => __('description'), 'name' => 'activities[1][description]'])
    //     </div>
    //     `;
    //     $('#activities').append(newRow);
    // })
});

$(document).ready(function () {
    // Listen for changes on all checkboxes with class 'activity-checkbox'
    $('.activity-checkbox').change(function () {
        // Get the data-activity-id attribute value of the changed checkbox
        var activityId = $(this).data('activity-id');

        // Check if the checkbox is checked or unchecked
        var isChecked = $(this).prop('checked');


        // Find all checkboxes with the same data-activity-id and set their checked property
        $('.parent-input[data-activity-id="' + activityId + '"]').prop('checked', isChecked);
    });

    $('#file').change(function () {

        $('#avatarForm').submit();
    });
});

$(document).ready(function () {


    const copyText = document.querySelector("#copyMe")
    const showText = document.querySelector("p")
    const copyBtn = document.getElementById("copyBtn")

    const copyMeOnClipboard = () => {
        copyText.select()
        copyText.setSelectionRange(0, 99999) // used for mobile phone
        document.execCommand("copy")
        showText.innerHTML = `${copyText.value} დაკოპირებულია`
        setTimeout(() => {
            showText.innerHTML = ""
        }, 1000)
    }

    if(copyBtn) copyBtn.addEventListener("click", copyMeOnClipboard);
});
