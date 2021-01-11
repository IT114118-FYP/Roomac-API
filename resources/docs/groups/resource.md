# Resource


## Import resources

Import resources.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/resources/import" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\hkdse\AppData\Local\Temp\php3FE9.tmp" 
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/import"
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
 **`api/resources/import`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>file</b></code>&nbsp; <small>file</small>     <br>
    



## Export resources

Export resources.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources/export?format=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/export"
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
 **`api/resources/export`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>format</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx.



## Remove multiple resources

Remove multiple resources.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/resources" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"ids":"{\"ids\": [1, 2]}"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": "{\"ids\": [1, 2]}"
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
 **`api/resources`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>ids</b></code>&nbsp; <small>array</small>     <br>
    Array of the resources' id



## Reset resources

Remove all resources.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/resources/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/reset"
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
 **`api/resources/reset`**



## Retrieve all resources

Retrieve all resources.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources"
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
        "id": 1,
        "category_id": 1,
        "branch_id": "ST",
        "number": "IT-417A",
        "title_en": "Interview Room",
        "title_hk": "接見室",
        "title_cn": "接见室",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453326\/aqmyrwsqxucpt5ql5dwj.jpg",
        "min_user": 1,
        "max_user": 20,
        "opening_time": "08:00:00",
        "closing_time": "15:00:00",
        "created_at": "2021-01-11T02:34:29.000000Z",
        "updated_at": "2021-01-11T02:34:29.000000Z"
    },
    {
        "id": 2,
        "category_id": 1,
        "branch_id": "ST",
        "number": "IT-421B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": "2021-01-11T02:34:31.000000Z",
        "updated_at": "2021-01-11T02:34:31.000000Z"
    },
    {
        "id": 3,
        "category_id": 1,
        "branch_id": "ST",
        "number": "CS-442",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": "2021-01-11T02:34:33.000000Z",
        "updated_at": "2021-01-11T02:34:33.000000Z"
    },
    {
        "id": 4,
        "category_id": 1,
        "branch_id": "ST",
        "number": "CS-404",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": "2021-01-11T02:34:34.000000Z",
        "updated_at": "2021-01-11T02:34:34.000000Z"
    },
    {
        "id": 5,
        "category_id": 2,
        "branch_id": "ST",
        "number": "CS-332B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": "2021-01-11T02:34:36.000000Z",
        "updated_at": "2021-01-11T02:34:36.000000Z"
    },
    {
        "id": 6,
        "category_id": 2,
        "branch_id": "ST",
        "number": "CS-N108B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": "2021-01-11T02:34:37.000000Z",
        "updated_at": "2021-01-11T02:34:37.000000Z"
    },
    {
        "id": 7,
        "category_id": 2,
        "branch_id": "ST",
        "number": "IT-427B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": "2021-01-11T02:34:38.000000Z",
        "updated_at": "2021-01-11T02:34:38.000000Z"
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/resources`**



## Add a resource

Add a resource.




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/resources" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources"
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
 **`api/resources`**



## Retrieve a resource

Retrieve a resource.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/1"
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
    "id": 1,
    "category_id": 1,
    "branch_id": "ST",
    "number": "IT-417A",
    "title_en": "Interview Room",
    "title_hk": "接見室",
    "title_cn": "接见室",
    "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453326\/aqmyrwsqxucpt5ql5dwj.jpg",
    "min_user": 1,
    "max_user": 20,
    "opening_time": "08:00:00",
    "closing_time": "15:00:00",
    "created_at": "2021-01-11T02:34:29.000000Z",
    "updated_at": "2021-01-11T02:34:29.000000Z"
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/resources/{resource}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>resource</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the resource.



## Update a resource

Update a resource.




> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}"
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
 **`api/resources/{resource}`**

<small class="badge badge-purple">PATCH</small>
 **`api/resources/{resource}`**



## Remove a resource

Remove a resource.




> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}"
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
 **`api/resources/{resource}`**




