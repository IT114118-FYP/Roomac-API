# Category


## Import categories

Import categories.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/categories/import" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\hkdse\AppData\Local\Temp\php9C7E.tmp" 
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories/import"
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
 **`api/categories/import`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>file</b></code>&nbsp; <small>file</small>     <br>
    



## Export categories

Export categories.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/categories/export?format=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories/export"
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



### Request
<small class="badge badge-green">GET</small>
 **`api/categories/export`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>format</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx.



## Remove multiple categories

Remove multiple categories.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"ids":"{\"ids\": [1, 2]}"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories"
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
 **`api/categories`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>ids</b></code>&nbsp; <small>array</small>     <br>
    Array of the categories' id



## Reset categories

Remove all categories.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/categories/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories/reset"
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
 **`api/categories/reset`**



## Retrieve all categories

Retrieve all categories.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories"
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
        "title_en": "Classroom",
        "title_hk": "課室",
        "title_cn": "教室",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610342834\/riak0mox4pqzxesenegs.jpg",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "title_en": "Library",
        "title_hk": "圖書館",
        "title_cn": "图书馆",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610343016\/ca8zmlcwcbcspgw6sked.jpg",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "title_en": "Computer Room",
        "title_hk": "電腦房",
        "title_cn": "电脑房",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
        "created_at": null,
        "updated_at": null
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/categories`**



## Add a category

Add a category.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories"
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
 **`api/categories`**



## Retrieve category items (Resources)

Retrieve category items (Resources).




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/categories/{category}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories/{category}"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Category] {category}",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 364,
    "trace": [
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 313,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\nunomaduro\\collision\\src\\Adapters\\Laravel\\ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 103,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 55,
            "function": "handleRequestUsingNamedLimiter",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 693,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 668,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 634,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 87,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 322,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 304,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 229,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 167,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 125,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 118,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 95,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 39,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 596,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 258,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\symfony\\console\\Application.php",
            "line": 920,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\symfony\\console\\Application.php",
            "line": 266,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\symfony\\console\\Application.php",
            "line": 142,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/categories/{category}`**



## Update a category

Update a category.




> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/categories/{category}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories/{category}"
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
 **`api/categories/{category}`**

<small class="badge badge-purple">PATCH</small>
 **`api/categories/{category}`**



## Remove a category

Remove a category.




> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/categories/{category}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/categories/{category}"
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
 **`api/categories/{category}`**




