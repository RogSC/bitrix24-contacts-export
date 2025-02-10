if(typeof Project === "undefined") {
    Project = {};
}
if(typeof Project.Exporter === "undefined") {
    Project.Exporter = {};
}

/**
 * Project.Exporter.ContactsExporter
 * @constructor
 */
Project.Exporter.ContactsExporter = function () {
    this.sendBtn = null;
    this.format = '';
};

Project.Exporter.ContactsExporter.prototype = {
    init() {
        this.getSendBtn();
        this.initSendEvent();
    },
    getSendBtn() {
        this.sendBtn = document.querySelector('.exporter .exporter-button-send');
    },
    initSendEvent() {
        this.sendBtn.addEventListener('click', (e) => {
            e.preventDefault();
            this.getFormat();
            this.send();
        });
    },
    getFormat() {
        let formatSelect = document.querySelector('.exporter select[name="format"]');
        this.format = formatSelect.options[formatSelect.selectedIndex].value;
    },
    send() {
        let data = {
            'format': this.format,
        };

        BX.ajax.runAction('my:contactsexport.Export.send', {
            data: data
        }).then((response) => {
            if (response.status === 'success') {
                window.location.href = response.data;
            }
        });
    },
};

BX.ready(function () {
    let exporter = new Project.Exporter.ContactsExporter;
    exporter.init();
});