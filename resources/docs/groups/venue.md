# Venue


## Import venues

Import venues.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/venues/import" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\hkdse\AppData\Local\Temp\php21D9.tmp" 
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues/import"
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
 **`api/venues/import`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>file</b></code>&nbsp; <small>file</small>     <br>
    



## Export venues

Export venues.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/venues/export?format=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues/export"
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
 **`api/venues/export`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>format</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx.



## Remove multiple venues

Remove multiple venues.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/venues" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"ids":"{\"ids\": [1, 2]}"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues"
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
 **`api/venues`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>ids</b></code>&nbsp; <small>array</small>     <br>
    Array of the venues' id



## Reset venues

Remove all venues.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/venues/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues/reset"
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
 **`api/venues/reset`**



## Retrieve all venues

Retrieve all venues.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/venues" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues"
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
        "branch_id": "ST",
        "number": "IT-421B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "opening_time": "09:00:00",
        "closing_time": "21:00:00",
        "created_at": "2020-11-11T07:16:59.000000Z",
        "updated_at": "2020-11-11T07:16:59.000000Z"
    },
    {
        "id": 2,
        "branch_id": "ST",
        "number": "CS-442",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "opening_time": "09:00:00",
        "closing_time": "21:00:00",
        "created_at": "2020-11-11T07:17:01.000000Z",
        "updated_at": "2020-11-11T07:17:01.000000Z"
    },
    {
        "id": 3,
        "branch_id": "ST",
        "number": "CS-404",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "opening_time": "09:00:00",
        "closing_time": "21:00:00",
        "created_at": "2020-11-11T07:17:03.000000Z",
        "updated_at": "2020-11-11T07:17:03.000000Z"
    },
    {
        "id": 4,
        "branch_id": "ST",
        "number": "CS-332B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "opening_time": "09:00:00",
        "closing_time": "21:00:00",
        "created_at": "2020-11-11T07:17:05.000000Z",
        "updated_at": "2020-11-11T07:17:05.000000Z"
    },
    {
        "id": 5,
        "branch_id": "ST",
        "number": "CS-N108B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "opening_time": "09:00:00",
        "closing_time": "21:00:00",
        "created_at": "2020-11-11T07:17:07.000000Z",
        "updated_at": "2020-11-11T07:17:07.000000Z"
    },
    {
        "id": 6,
        "branch_id": "ST",
        "number": "IT-427B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "opening_time": "09:00:00",
        "closing_time": "21:00:00",
        "created_at": "2020-11-11T07:17:09.000000Z",
        "updated_at": "2020-11-11T07:17:09.000000Z"
    },
    {
        "id": 7,
        "branch_id": "ST",
        "number": "IT-417A",
        "title_en": "Interview Room",
        "title_hk": "接見室",
        "title_cn": "接见室",
        "opening_time": "09:00:00",
        "closing_time": "15:00:00",
        "created_at": "2020-11-11T07:17:11.000000Z",
        "updated_at": "2020-11-11T07:17:11.000000Z"
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/venues`**



## Add a venue

Add a venue.




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/venues" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues"
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
 **`api/venues`**



## Retrieve a venue

Retrieve a venue.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/venues/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues/1"
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
    "branch_id": "ST",
    "number": "IT-421B",
    "title_en": "",
    "title_hk": "",
    "title_cn": "",
    "opening_time": "09:00:00",
    "closing_time": "21:00:00",
    "created_at": "2020-11-11T07:16:59.000000Z",
    "updated_at": "2020-11-11T07:16:59.000000Z"
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/venues/{venue}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>venue</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the venue.



## Update a venue

Update a venue.




> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/venues/{venue}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues/{venue}"
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
 **`api/venues/{venue}`**

<small class="badge badge-purple">PATCH</small>
 **`api/venues/{venue}`**



## Remove a venue

Remove a venue.




> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/venues/{venue}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues/{venue}"
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
 **`api/venues/{venue}`**




