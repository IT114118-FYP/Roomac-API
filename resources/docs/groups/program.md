# Program


## Import programs

Import programs.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/programs/import" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\hkdse\AppData\Local\Temp\phpAB68.tmp" 
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs/import"
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
 **`api/programs/import`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>file</b></code>&nbsp; <small>file</small>     <br>
    



## Export programs

Export programs.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/programs/export?format=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs/export"
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
 **`api/programs/export`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>format</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx.



## Remove multiple programs

Remove multiple programs.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/programs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"ids":"{\"ids\": [\"IT114118\", \"IT123456\"]}"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": "{\"ids\": [\"IT114118\", \"IT123456\"]}"
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
 **`api/programs`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>ids</b></code>&nbsp; <small>array</small>     <br>
    Array of the programs' id



## Reset programs

Remove all programs.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/programs/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs/reset"
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
 **`api/programs/reset`**



## Retrieve all programs

Retrieve all programs.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/programs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs"
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
        "id": "CE114301",
        "title_en": "Higher Diploma in Child Care and Education",
        "title_hk": "幼兒教育高級文憑",
        "title_cn": "幼儿教育高级文凭",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "IT114105",
        "title_en": "Higher Diploma in Software Engineering",
        "title_hk": "軟件工程高級文憑",
        "title_cn": "软件工程高级文凭",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "IT114118",
        "title_en": "Higher Diploma in AI and Mobile Applications Development",
        "title_hk": "人工智能及手機軟件開發高級文憑",
        "title_cn": "人工智能及手机软件开发高级文凭",
        "created_at": null,
        "updated_at": null
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/programs`**



## Add a program

Add a program.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/programs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"IT114118","title_en":"Higher Diploma in AI and Mobile Applications Development","title_hk":"\u4eba\u5de5\u667a\u80fd\u53ca\u624b\u6a5f\u8edf\u4ef6\u958b\u767c\u9ad8\u7d1a\u6587\u6191","title_cn":"\u4eba\u5de5\u667a\u80fd\u53ca\u624b\u673a\u8f6f\u4ef6\u5f00\u53d1\u9ad8\u7ea7\u6587\u51ed"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "IT114118",
    "title_en": "Higher Diploma in AI and Mobile Applications Development",
    "title_hk": "\u4eba\u5de5\u667a\u80fd\u53ca\u624b\u6a5f\u8edf\u4ef6\u958b\u767c\u9ad8\u7d1a\u6587\u6191",
    "title_cn": "\u4eba\u5de5\u667a\u80fd\u53ca\u624b\u673a\u8f6f\u4ef6\u5f00\u53d1\u9ad8\u7ea7\u6587\u51ed"
}

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
 **`api/programs`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>id</b></code>&nbsp; <small>string</small>     <br>
    The ID of the program.

<code><b>title_en</b></code>&nbsp; <small>string</small>     <br>
    Title of the program in English.

<code><b>title_hk</b></code>&nbsp; <small>string</small>     <br>
    Title of the program in Traditional Chinese.

<code><b>title_cn</b></code>&nbsp; <small>string</small>     <br>
    Title of the program in Simplified Chinese.



## Retrieve a program

Retrieve a program.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/programs/IT114118" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs/IT114118"
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
    "id": "IT114118",
    "title_en": "Higher Diploma in AI and Mobile Applications Development",
    "title_hk": "人工智能及手機軟件開發高級文憑",
    "title_cn": "人工智能及手机软件开发高级文凭",
    "created_at": null,
    "updated_at": null
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/programs/{program}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>program</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the program.



## Update a program

Update a program.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/programs/IT114118" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title_en":"Higher Diploma in AI and Mobile Applications Development","title_hk":"\u4eba\u5de5\u667a\u80fd\u53ca\u624b\u6a5f\u8edf\u4ef6\u958b\u767c\u9ad8\u7d1a\u6587\u6191","title_cn":"\u4eba\u5de5\u667a\u80fd\u53ca\u624b\u673a\u8f6f\u4ef6\u5f00\u53d1\u9ad8\u7ea7\u6587\u51ed"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs/IT114118"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title_en": "Higher Diploma in AI and Mobile Applications Development",
    "title_hk": "\u4eba\u5de5\u667a\u80fd\u53ca\u624b\u6a5f\u8edf\u4ef6\u958b\u767c\u9ad8\u7d1a\u6587\u6191",
    "title_cn": "\u4eba\u5de5\u667a\u80fd\u53ca\u624b\u673a\u8f6f\u4ef6\u5f00\u53d1\u9ad8\u7ea7\u6587\u51ed"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/programs/{program}`**

<small class="badge badge-purple">PATCH</small>
 **`api/programs/{program}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>program</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the program.

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>title_en</b></code>&nbsp; <small>string</small>     <br>
    Title of the program in English.

<code><b>title_hk</b></code>&nbsp; <small>string</small>     <br>
    Title of the program in Traditional Chinese.

<code><b>title_cn</b></code>&nbsp; <small>string</small>     <br>
    Title of the program in Simplified Chinese.



## Remove a program

Remove a program.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/programs/IT114118" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/programs/IT114118"
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
 **`api/programs/{program}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>program</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the program.




