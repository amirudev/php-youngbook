const header = {
    headers: {
        "content-type": "application/json; charset=UTF-8",
        "connection": "keep-alive"
    },
    method: "GET",
};

appendloc = (district, id, location) => {
    let address = document.getElementById(district);
    let option = document.createElement('option');
    option.innerText = location;
    option.value = id;
    address.appendChild(option);
}

let getdata = (url, district) => {
    fetch(url, header)
        .then(data => { return data.json() })
        .then(res => {
            let locations = res[district];
            let location;
            let arrloc = 0;
            for (location of locations) {
                appendloc(district, location.id, location.nama);
                arrloc += 1;
            }
        })
        .catch(err => console.log(err));
}

provinsi = () => {
    var url = "https://cors-anywhere.herokuapp.com/https://dev.farizdotid.com/api/daerahindonesia/provinsi";
    getdata(url, "provinsi");
}

kabupaten = () => {
    let id = document.getElementById('provinsi').value;
    url = `https://cors-anywhere.herokuapp.com/https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id}`;
    getdata(url, "kota_kabupaten");
}

provinsi();