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
    -F "file=@C:\Users\hkdse\AppData\Local\Temp\php4C67.tmp" 
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
        "created_at": "2020-11-11T07:16:39.000000Z",
        "updated_at": "2020-11-11T07:16:39.000000Z"
    },
    {
        "id": "HW",
        "title_en": "Haking Wong",
        "title_hk": "黃克競",
        "title_cn": "黄克竞",
        "created_at": "2020-11-11T07:16:41.000000Z",
        "updated_at": "2020-11-11T07:16:41.000000Z"
    },
    {
        "id": "KC",
        "title_en": "Kwai Chung",
        "title_hk": "葵涌",
        "title_cn": "葵涌",
        "created_at": "2020-11-11T07:16:44.000000Z",
        "updated_at": "2020-11-11T07:16:44.000000Z"
    },
    {
        "id": "KT",
        "title_en": "Kwun Tong",
        "title_hk": "觀塘",
        "title_cn": "观塘",
        "created_at": "2020-11-11T07:16:47.000000Z",
        "updated_at": "2020-11-11T07:16:47.000000Z"
    },
    {
        "id": "LWL",
        "title_en": "Lee Wai Lee",
        "title_hk": "李惠利",
        "title_cn": "李惠利",
        "created_at": "2020-11-11T07:16:49.000000Z",
        "updated_at": "2020-11-11T07:16:49.000000Z"
    },
    {
        "id": "MH",
        "title_en": "Morrison Hill",
        "title_hk": "摩理臣山",
        "title_cn": "摩理臣山",
        "created_at": "2020-11-11T07:16:51.000000Z",
        "updated_at": "2020-11-11T07:16:51.000000Z"
    },
    {
        "id": "ST",
        "title_en": "Sha Tin",
        "title_hk": "沙田",
        "title_cn": "沙田",
        "created_at": "2020-11-11T07:16:53.000000Z",
        "updated_at": "2020-11-11T07:16:53.000000Z"
    },
    {
        "id": "TM",
        "title_en": "Tuen Mun",
        "title_hk": "屯門",
        "title_cn": "屯门",
        "created_at": "2020-11-11T07:16:57.000000Z",
        "updated_at": "2020-11-11T07:16:57.000000Z"
    },
    {
        "id": "TY",
        "title_en": "Tsing Yi",
        "title_hk": "青衣",
        "title_cn": "青衣",
        "created_at": "2020-11-11T07:16:55.000000Z",
        "updated_at": "2020-11-11T07:16:55.000000Z"
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
    "created_at": "2020-11-11T07:16:53.000000Z",
    "updated_at": "2020-11-11T07:16:53.000000Z"
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




