# Branch Setting


## Retrieve the active branch&#039;s settings

Retrieve the active branch&#039;s settings.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/branches/ST/settings/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings/active"
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


> Example response (500):

```json
{
    "message": "could not find driver (SQL: select * from `branches` where `id` = ST limit 1)",
    "exception": "Illuminate\\Database\\QueryException",
    "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
    "line": 671,
    "trace": [
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 631,
            "function": "runQueryCallback",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 339,
            "function": "run",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2302,
            "function": "select",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2290,
            "function": "runSelect",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2785,
            "function": "Illuminate\\Database\\Query\\{closure}",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2291,
            "function": "onceWithColumns",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 547,
            "function": "get",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 531,
            "function": "getModels",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\BuildsQueries.php",
            "line": 147,
            "function": "get",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 1563,
            "function": "first",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ImplicitRouteBinding.php",
            "line": 46,
            "function": "resolveRouteBinding",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 804,
            "function": "resolveForRoute",
            "class": "Illuminate\\Routing\\ImplicitRouteBinding",
            "type": "::"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 39,
            "function": "substituteImplicitBindings",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
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
 **`api/branches/{branch}/settings/active`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>branch</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the branch.



## Retrieve all branch&#039;s settings versions

Retrieve all branch&#039;s settings versions.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/branches/ST/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings"
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


> Example response (500):

```json
{
    "message": "could not find driver (SQL: select * from `branches` where `id` = ST limit 1)",
    "exception": "Illuminate\\Database\\QueryException",
    "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
    "line": 671,
    "trace": [
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 631,
            "function": "runQueryCallback",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 339,
            "function": "run",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2302,
            "function": "select",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2290,
            "function": "runSelect",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2785,
            "function": "Illuminate\\Database\\Query\\{closure}",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2291,
            "function": "onceWithColumns",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 547,
            "function": "get",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 531,
            "function": "getModels",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\BuildsQueries.php",
            "line": 147,
            "function": "get",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 1563,
            "function": "first",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ImplicitRouteBinding.php",
            "line": 46,
            "function": "resolveRouteBinding",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 804,
            "function": "resolveForRoute",
            "class": "Illuminate\\Routing\\ImplicitRouteBinding",
            "type": "::"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 39,
            "function": "substituteImplicitBindings",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
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
 **`api/branches/{branch}/settings`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>branch</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the branch.



## Add a new version of branch&#039;s settings

Add a new version of branch&#039;s settings




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings?name=My+Special+Settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings"
);

let params = {
    "name": "My Special Settings",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
 **`api/branches/{branch}/settings`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>branch</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the branch.

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    The name of the setting. Defaults to "New Settings".



## Retrieve a branch&#039;s settings by version

Retrieve a branch&#039;s settings by version.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/branches/ST/settings/0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings/0"
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


> Example response (500):

```json
{
    "message": "could not find driver (SQL: select * from `branches` where `id` = ST limit 1)",
    "exception": "Illuminate\\Database\\QueryException",
    "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
    "line": 671,
    "trace": [
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 631,
            "function": "runQueryCallback",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 339,
            "function": "run",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2302,
            "function": "select",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2290,
            "function": "runSelect",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2785,
            "function": "Illuminate\\Database\\Query\\{closure}",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2291,
            "function": "onceWithColumns",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 547,
            "function": "get",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 531,
            "function": "getModels",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\BuildsQueries.php",
            "line": 147,
            "function": "get",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 1563,
            "function": "first",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ImplicitRouteBinding.php",
            "line": 46,
            "function": "resolveRouteBinding",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 804,
            "function": "resolveForRoute",
            "class": "Illuminate\\Routing\\ImplicitRouteBinding",
            "type": "::"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 39,
            "function": "substituteImplicitBindings",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\hkdse\\Documents\\GitHub\\Laravel-Web-App\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
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
 **`api/branches/{branch}/settings/{version}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>branch</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the branch.

<code><b>version</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The version of the setting.



## Update a branch&#039;s settings by version

Update a branch&#039;s settings by version.




> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings/1?name=My+New+Settings+Name" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings/1"
);

let params = {
    "name": "My New Settings Name",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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


> Example response (200, success):

```json

""
```
> Example response (401, default_version_not_editable):

```json

""
```
> Example response (402, active_version_not_editable):

```json

""
```
> Example response (404, version_not_found):

```json

""
```

### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/branches/{branch}/settings/{version}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>branch</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the branch.

<code><b>version</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The version of the setting.

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    The new name of the setting.



## Remove a branch&#039;s settings by version

Remove a branch&#039;s settings by version.




> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings/0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/ST/settings/0"
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


> Example response (200, success):

```json

""
```
> Example response (401, default_version_not_editable):

```json

""
```
> Example response (402, active_version_not_editable):

```json

""
```
> Example response (404, version_not_found):

```json

""
```

### Request
<small class="badge badge-red">DELETE</small>
 **`api/branches/{branch}/settings/{version}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>branch</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the branch.

<code><b>version</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The version of the setting.




