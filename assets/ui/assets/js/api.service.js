class API {
    constructor() {}

    saveResume(jsonData) {
        return new Promise((resolve, reject) => {
            setTimeout(() => $.ajax({
                type: 'post',
                url: base_url + 'api/v1/resume/save',
                data: jsonData,
                dataType: 'json',
                success: resolve,
                error: reject
            }), 1000);
        });
    }


    getResumeData(jsonData) {
        return new Promise((resolve, reject) => {
            setTimeout(() => $.ajax({
                type: 'post',
                url: base_url + 'api/v1/resume/get',
                data: jsonData,
                dataType: 'json',
                success: resolve,
                error: reject
            }), 0);
        });
    }

    removeLang(jsonData) {
        return new Promise((resolve, reject) => {
            setTimeout(() => $.ajax({
                type: 'post',
                url: base_url + 'api/v1/resume/lang/remove',
                data: jsonData,
                dataType: 'json',
                success: resolve,
                error: reject
            }), 0);
        });
    }

    removeExp(jsonData) {
        return new Promise((resolve, reject) => {
            setTimeout(() => $.ajax({
                type: 'post',
                url: base_url + 'api/v1/resume/exp/remove',
                data: jsonData,
                dataType: 'json',
                success: resolve,
                error: reject
            }), 0);
        });
    }

    removeEdu(jsonData) {
        return new Promise((resolve, reject) => {
            setTimeout(() => $.ajax({
                type: 'post',
                url: base_url + 'api/v1/resume/edu/remove',
                data: jsonData,
                dataType: 'json',
                success: resolve,
                error: reject
            }), 0);
        });
    }

    throwError() {
        return new Promise((resolve, reject) => {
            setTimeout(() => reject(new Error('Intentional Error')), 200);
        });
    }
}