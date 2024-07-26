/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Module/App: Main Js
 */


(function ($) {

    'use strict';

    function initSlimscroll() {
        $('.slimscroll').slimscroll({
            height: 'auto',
            position: 'right',
            size: "7px",
            color: '#9ea5ab',
            wheelStep: 5,
            touchScrollStep: 50
        });
    }

    function initMetisMenu() {
        $('.navbar-toggle').on('click', function (event) {
            $(this).toggleClass('open');
            $('#navigation').slideToggle(400);
        });

        $('.navigation-menu>li').slice(-2).addClass('last-elements');

        $('.navigation-menu li.has-submenu a[href="#"]').on('click', function (e) {
            if ($(window).width() < 992) {
                e.preventDefault();
                $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
            }
        });


    }


    function initLeftMenuCollapse() {
        // Left menu collapse
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $("body").toggleClass("enlarge-menu");
            initSlimscroll();
        });
    }

    function initEnlarge() {
        if ($(window).width() < 1023) {
            $('body').addClass('enlarge-menu');
        } else {
            if ($('body').data('keep-enlarged') != true)
                $('body').removeClass('enlarge-menu');
        }
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $(".navigation-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().parent().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().parent().parent().addClass("active"); // add active class to an anchor
            }
        });
    }




    function init() {
        initSlimscroll();
        initMetisMenu();
        initLeftMenuCollapse();
        initEnlarge();
        initActiveMenu();
        Waves.init();
    }

    init();

})(jQuery)

function createToast(message, duration = 120000) {
    let toastContainer = document.getElementById("toast-container");
    if (!toastContainer) {
        toastContainer = document.createElement("div");
        toastContainer.id = "toast-container";
        toastContainer.style.position = "fixed";
        toastContainer.style.top = "20px";
        toastContainer.style.right = "20px";
        toastContainer.style.zIndex = "1050";
        toastContainer.style.minWidth = "23em";
        toastContainer.style.maxWidth = "23em";
        document.body.appendChild(toastContainer);
    }

    const toast = document.createElement("div");
    toast.className = "toast fade show flip animated";
    toast.role = "alert";
    toast.setAttribute("aria-live", "assertive");
    toast.setAttribute("aria-atomic", "true");


    const toastHeader = document.createElement("div");
    toastHeader.className = "toast-header";

    const icon = document.createElement("i");
    icon.className = "mdi mdi-circle-slice-8 font-18 mr-1 text-primary";
    toastHeader.appendChild(icon);

    const strong = document.createElement("strong");
    strong.className = "mr-auto";
    strong.textContent = "Frogetor";
    toastHeader.appendChild(strong);

    const timeSmall = document.createElement("small");
    timeSmall.id = "toast-time";
    timeSmall.textContent = "0 mins ago";
    toastHeader.appendChild(timeSmall);

    const closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.className = "ml-2 mb-1 close text-white";
    closeButton.setAttribute("data-dismiss", "toast");
    closeButton.setAttribute("aria-label", "Close");
    closeButton.innerHTML = '<span aria-hidden="true">&times;</span>';
    closeButton.onclick = () => toast.remove();
    toastHeader.appendChild(closeButton);

    toast.appendChild(toastHeader);

    const toastBody = document.createElement("div");
    toastBody.className = "toast-body";
    toastBody.textContent = message;
    toast.appendChild(toastBody);

    toastContainer.appendChild(toast);

    let startTime = Date.now();
    const interval = setInterval(() => {
        let elapsed = Math.floor((Date.now() - startTime) / 60000);
        timeSmall.textContent = `${elapsed} mins ago`;
    }, 60000);

    setTimeout(() => {
        toast.remove();
        clearInterval(interval);
    }, duration);
}

function generateSecurePasswordAndToast() {
    const passwordField = document.getElementById("password");
    const passwordConfirm = document.getElementById("password-confirm");
    if (passwordField && passwordConfirm) {
        const newPassword = generateSecurePassword(16);
        passwordField.value = newPassword;
        passwordConfirm.value = newPassword;
        copyToClipboard(newPassword);
        createToast("Password copied to clipboard!");
    } else {
        console.error("No element found with id 'password'");
    }
}

function generateSecurePassword(length) {
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?";
    let password = "";
    for (let i = 0, n = charset.length; i < length; ++i) {
        password += charset.charAt(Math.floor(Math.random() * n));
    }
    return password;
}

function copyToClipboard(text) {
    const tempInput = document.createElement("input");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
}

function getInitials(fullName) {
    const nameParts = fullName.trim().split(' ');
    if (nameParts.length < 2) {
        return fullName.charAt(0).toUpperCase();
    }
    const firstNameInitial = nameParts[0].charAt(0).toUpperCase();
    const lastNameInitial = nameParts[1].charAt(0).toUpperCase();
    return `${firstNameInitial}${lastNameInitial}`;
}

function hashStringToPastelColor(str) {
    let hash = 0;
    for (let i = 0; i < str.length; i++) {
        hash = str.charCodeAt(i) + ((hash << 5) - hash);
    }
    const r = (hash & 0xFF0000) >> 16;
    const g = (hash & 0x00FF00) >> 8;
    const b = hash & 0x0000FF;

    const pastelR = Math.floor((r + 255) / 2);
    const pastelG = Math.floor((g + 255) / 2);
    const pastelB = Math.floor((b + 255) / 2);

    return `rgb(${pastelR}, ${pastelG}, ${pastelB})`;
}

document.addEventListener('DOMContentLoaded', function () {
    const userNameElement = document.getElementById('user-name');
    if (userNameElement) {
        const initials = getInitials(userNameElement.textContent);
        const initialsElement = document.getElementById('user-initials');
        const initialsElementNav = document.getElementById('user-initials-nv');

        if (initialsElement && initialsElementNav) {
            initialsElementNav.textContent = initials;
            initialsElement.textContent = initials;
            const color = hashStringToPastelColor(initials);
            initialsElement.style.backgroundColor = color;
            initialsElementNav.style.backgroundColor = color;
        }
    }
});