# Branch


## Import branches

Import branches.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/branches/import" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\hkdse\AppData\Local\Temp\php41F3.tmp" 
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/import"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/branches/import`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>file</b></code>&nbsp; <small>file</small>     <br>
    



## Export branches

Export branches.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/branches/export?format=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/export"
);

let params = {
    "format": "csv",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/branches/export`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>format</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx.



## Remove multiple branches

Remove multiple branches.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"ids":"{\"ids\": [\"ST\", \"TY\"]}"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": "{\"ids\": [\"ST\", \"TY\"]}"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-red">DELETE</small>
 **`api/branches`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>ids</b></code>&nbsp; <small>array</small>     <br>
    Array of the branches' id



## Reset branches

Remove all branches.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/branches/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-red">DELETE</small>
 **`api/branches/reset`**



## Retrieve all branches

Retrieve all branches.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": "CW",
        "title_en": "Chai Wan",
        "title_hk": "柴灣",
        "title_cn": "柴湾",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550859\/CW_limxvp.jpg",
        "lat": "22.27184971",
        "lng": "114.23967000",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "HW",
        "title_en": "Haking Wong",
        "title_hk": "黃克競",
        "title_cn": "黄克竞",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550860\/HW_nhu0jr.jpg",
        "lat": "22.33551569",
        "lng": "114.15235304",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "KC",
        "title_en": "Kwai Chung",
        "title_hk": "葵涌",
        "title_cn": "葵涌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550860\/KC_hxxaga.jpg",
        "lat": "22.36187488",
        "lng": "114.12739741",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "KT",
        "title_en": "Kwun Tong",
        "title_hk": "觀塘",
        "title_cn": "观塘",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550861\/KT_ktbvgg.jpg",
        "lat": "22.31356560",
        "lng": "114.23194114",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "LWL",
        "title_en": "Lee Wai Lee",
        "title_hk": "李惠利",
        "title_cn": "李惠利",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550860\/LWL_s7uimr.jpg",
        "lat": "22.30620069",
        "lng": "114.25416772",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "MH",
        "title_en": "Morrison Hill",
        "title_hk": "摩理臣山",
        "title_cn": "摩理臣山",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550860\/MH_tt43bg.jpg",
        "lat": "22.27619053",
        "lng": "114.17792361",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "ST",
        "title_en": "Sha Tin",
        "title_hk": "沙田",
        "title_cn": "沙田",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550859\/ST_riofal.jpg",
        "lat": "22.39041332",
        "lng": "114.19803821",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "TM",
        "title_en": "Tuen Mun",
        "title_hk": "屯門",
        "title_cn": "屯门",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550860\/TM_vwyaga.jpg",
        "lat": "22.39311344",
        "lng": "113.96646235",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "TW",
        "title_en": "Tsuen Wan",
        "title_hk": "荃灣",
        "title_cn": "荃灣",
        "image_url": "https:\/\/upload.wikimedia.org\/wikipedia\/commons\/3\/38\/Lik_Sang_Plaza_and_Tsuen_Wan_Footbridge_Network_%28Hong_Kong%29.jpg",
        "lat": "22.37356060",
        "lng": "114.11919230",
        "created_at": "2021-04-20T16:53:11.000000Z",
        "updated_at": "2021-04-20T16:53:11.000000Z"
    },
    {
        "id": "TY",
        "title_en": "Tsing Yi",
        "title_hk": "青衣",
        "title_cn": "青衣",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550859\/TY_rli7ox.jpg",
        "lat": "22.34261363",
        "lng": "114.10624981",
        "created_at": null,
        "updated_at": null
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/branches`**



## Add a branch

Add a branch.




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/branches`**



## Retrieve a branch

Retrieve a branch.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/branches/ST" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/ST"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": "ST",
    "title_en": "Sha Tin",
    "title_hk": "沙田",
    "title_cn": "沙田",
    "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1614550859\/ST_riofal.jpg",
    "lat": "22.39041332",
    "lng": "114.19803821",
    "created_at": null,
    "updated_at": null
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/branches/{branch}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>branch</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the branch.



## Update a branch

Update a branch.




> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/branches/{branch}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/{branch}"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/branches/{branch}`**

<small class="badge badge-purple">PATCH</small>
 **`api/branches/{branch}`**



## Remove a branch

Remove a branch.




> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/branches/{branch}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/{branch}"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-red">DELETE</small>
 **`api/branches/{branch}`**




