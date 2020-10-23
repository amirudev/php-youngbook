import { header } from './api_setting.js';

let pickname_provinsi = (id) => {
    url = `https://dev.farizdotid.com/api/daerahindonesia/provinsi/${id}`;
    fetch(url, header)
        .then(data => { data.json })
        .then(res => { console.log(res) })
        .catch(err => { console.log(err) });
}

// ERROR : user_signup_pickname.js:1 Uncaught SyntaxError: Cannot use import statement outside a module