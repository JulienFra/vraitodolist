import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const modal = {
    open: () => {
        document.getElementById("deleteModal").classList.remove("hidden");
    },

    close: () => {
        document.getElementById("deleteModal").classList.add("hidden");
    },
};

window.modal = modal;
