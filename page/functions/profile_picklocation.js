header = {
    headers: {
        "content-type": "application/json; charset=UTF-8",
        "connection": "keep-alive"
    },
    method: "GET",
}

location_pickname = (id) => {
    let location_id = document.getElementById('location_id');
    let location_id_value = location_id.innerHTML;
    let url = `https://cors-anywhere.herokuapp.com/http://dev.farizdotid.com/api/daerahindonesia/kota/${location_id_value}`;
    location_id.innerHTML = 'Loading ...';
    fetch(url, header)
        .then(data => { return data.json(); })
        .then(res => {
            let location_name = res.nama;
            let url = `https://cors-anywhere.herokuapp.com/http://dev.farizdotid.com/api/daerahindonesia/provinsi/${res.id_provinsi}`;
            fetch(url, header)
                .then(data => { return data.json(); })
                .then(res => {
                    console.log(location_name += ', ' + res.nama);
                    location_id.innerHTML = location_name;
                    console.log("Completed")
                })
                .catch(err => { console.log(err) })
        })
        .catch(err => { console.log(err) })
}