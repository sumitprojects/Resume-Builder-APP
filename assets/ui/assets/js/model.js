const EDEX = ['ED', 'EX'];
const LODING = ` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>`;
const language = function(data) {
    let self = this;
    self.lang_id = ko.observable();
    self.lang_name = ko.observable();
    self.lang_level = ko.observable();
    if (data !== null || data !== undefined) {
        ko.mapping.fromJS(data, { 'include': ["lang_id", "lang_name", "lang_level"] }, this);
    }
}

const eduex = function(data) {
    let self = this;
    self.eduex_id = ko.observable();
    self.eduex_name = ko.observable();
    self.eduex_start_date = ko.observable();
    self.eduex_end_date = ko.observable();
    self.eduex_title = ko.observable();
    self.eduex_desc = ko.observable();
    self.eduex_type = ko.observable();
    if (data !== null || data !== undefined) {
        ko.mapping.fromJS(data, { 'include': ["eduex_id", "eduex_name", "eduex_start_date", "eduex_end_date", "eduex_title", "eduex_desc", "eduex_type"] }, this);
    }
}


const person = function(data) {
    let self = this;
    self.per_id = ko.observable();
    self.per_fullname = ko.observable();
    self.per_dob = ko.observable();
    self.per_website = ko.observable();
    self.per_location = ko.observable();
    self.per_github = ko.observable();
    self.per_fb = ko.observable();
    self.per_tw = ko.observable();
    if (data !== null || data !== undefined) {
        ko.mapping.fromJS(data, { 'include': ["per_id", "per_fullname", "per_dob", "per_website", "per_location", "per_github", "per_fb", "per_tw"] }, this);
    }
}

const user = function(data) {
    let self = this;
    self.user_id = ko.observable();
    self.user_email = ko.observable();
    self.user_profile_pic = ko.observable();
    self.user_mobile = ko.observable();
    if (data !== null || data !== undefined) {
        ko.mapping.fromJS(data, { 'include': ["user_id", "user_email", "user_profile_pic", "user_mobile"] }, this);
    }
}

const resumeBuilder = function() {
    let self = this;
    self.user = ko.observable();
    self.person = ko.observable();
    self.education = ko.observableArray([]);
    self.experience = ko.observableArray([]);
    self.langSkill = ko.observableArray([]);
    self.currentEdu = ko.observable(false);
    self.EDUCATION = [{ 'label': 'SSC' }, { 'label': 'HSC' }, { 'label': 'GRADUATE' }, { 'label': 'POST GRADUATE' }];
    self.LANGSKILL = [{ 'label': 'ELEMENTRY' }, { 'label': 'LIMITED' }, { 'label': 'PRO' }, { 'label': 'FULL_PRO' }, { 'label': 'NATIVE' }];
    self.LANG = [{ 'label': 'ENGLISH' }, { 'label': 'GUJARATI' }, { 'label': 'HINDI' }];

    // init the model
    self.init = function() {
        self.user(new user());
        self.person(new person());
    }
    self.init();

    ko.computed(async function() {
        let data = {};
        data.user_id = $('input[name="userhash"]').val();
        let api = new API();
        let response = await api.getResumeData(JSON.stringify(data));
        // response = JSON.parse(response);
        if (response.hasOwnProperty('data')) {

            if (Array.isArray(response.data.edu_data)) {
                data = response.data.edu_data;
                $.map(data, function(item) {
                    if (item !== null || item !== undefined) {
                        data = new eduex(item);
                        data.eduex_type("ED");
                        self.education.push(data);
                    }
                });
            }

            if (Array.isArray(response.data.exp_data)) {
                data = response.data.exp_data;
                $.map(data, function(item) {
                    if (item !== null || item !== undefined) {
                        data = new eduex(item);
                        data.eduex_type("EX");
                        self.experience.push(data);
                    }
                });
            }

            if (Array.isArray(response.data.lang_data)) {
                data = response.data.lang_data;
                console.log(data);
                $.map(data, function(item) {
                    if (item !== null || item !== undefined) {
                        self.langSkill.push(new language(item));
                    }
                });
            }

            self.person(new person(response.data.per_data));
            self.user(new user(response.data.user_data));
        }
    }, this);


    self.addLang = function() {
        let lang = new language();
        self.langSkill.push(lang);
    }

    self.removeLang = function(lang) {

        if (lang.lang_id()) {
            setTimeout(async function() {
                let api = new API();
                let response = await api.removeLang(JSON.stringify({ 'id': lang.lang_id(), user_id: $('input[name="userhash"]').val() }));
            }, 100);
        }
        self.langSkill.remove(lang);
    }

    self.addEdu = function() {
        let edu = new eduex();
        edu.eduex_type("ED");
        self.education.push(edu);
    }
    self.removeEdu = function(edu) {
        if (edu.eduex_id()) {
            setTimeout(async function() {
                let api = new API();
                let response = await api.removeEdu(JSON.stringify({ 'id': edu.eduex_id(), user_id: $('input[name="userhash"]').val() }));
            }, 100);
        }

        self.education.remove(edu);
    }

    self.addExp = function() {
        let ex = new eduex();
        ex.eduex_type("EX");
        self.experience.push(ex);
    }
    self.removeExp = function(exp) {
        if (exp.eduex_id()) {
            setTimeout(async function() {
                let api = new API();
                let response = await api.removeEdu(JSON.stringify({ 'id': exp.eduex_id(), user_id: $('input[name="userhash"]').val() }));
            }, 100);
        }
        self.experience.remove(exp);
    }

    self.submitResume = function() {
        $('.form-submit-btn').attr('disabled', true);
        $('.form-submit-btn').html(LODING);
        let data = {};
        data.user = ko.mapping.toJS(self.user());
        data.person = ko.mapping.toJS(self.person());
        data.education = ko.mapping.toJS(self.education());
        data.experience = ko.mapping.toJS(self.experience());
        data.langSkill = ko.mapping.toJS(self.langSkill());
        data.userhash = $('input[name="userhash"]').val();
        setTimeout(async function() {
            let api = new API();
            let response = await api.saveResume(JSON.stringify(data));
            if (response.hasOwnProperty('redirect')) {
                setTimeout(function() {
                    window.location.href = response.redirect;
                }, 1000);
            } else {
                alert('Data Not Inserted.');
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            }
        }, 0);
    }
}

$(document).ready(function() {
    ko.applyBindings(new resumeBuilder('deferred'));
});