# Endpoints


## docs.json




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/docs.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/docs.json"
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
    "variable": [],
    "info": {
        "name": "Laravel API",
        "_postman_id": "53e3489d-08bf-4d6f-94ba-447b35c356b2",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.1.0\/collection.json"
    },
    "item": [
        {
            "name": "Campus",
            "description": "",
            "item": [
                {
                    "name": "Retrieve all Campuses",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/campus",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/campus"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Add a Campus",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/campus",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/campus"
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Retrieve a Campus",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/campus\/:campus",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/campus\/:campus"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Update a Campus",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/campus\/:campus",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/campus\/:campus"
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Remove a Campus",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/campus\/:campus",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/campus\/:campus"
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                }
            ]
        },
        {
            "name": "Endpoints",
            "description": "",
            "item": [
                {
                    "name": "docs.json",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "docs.json",
                            "query": [],
                            "raw": "http:\/\/localhost\/docs.json"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "docs.openapi",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "docs.openapi",
                            "query": [],
                            "raw": "http:\/\/localhost\/docs.openapi"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Return an empty response simply to trigger the storage of the CSRF cookie in the browser.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "sanctum\/csrf-cookie",
                            "query": [],
                            "raw": "http:\/\/localhost\/sanctum\/csrf-cookie"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Invoke the controller method.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "\/",
                            "query": [],
                            "raw": "http:\/\/localhost\/\/"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                }
            ]
        },
        {
            "name": "Login",
            "description": "",
            "item": [
                {
                    "name": "Authenticate a User",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/login",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/login"
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Logout a User",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/logout",
                            "query": [
                                {
                                    "key": "global",
                                    "value": "",
                                    "description": "When this value is set to true all of the tokens issued to the user will be revoked. Defaults to false.",
                                    "disabled": true
                                }
                            ],
                            "raw": "http:\/\/localhost\/api\/logout?global="
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": null
                    },
                    "response": []
                }
            ]
        },
        {
            "name": "User",
            "description": "",
            "item": [
                {
                    "name": "Retrieve me",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/user\/me",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/user\/me"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Retrieve all Users",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/user",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/user"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Add a User",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/user",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/user"
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Retrieve a User",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/user\/:user",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/user\/:user"
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Update a User",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/user\/:user",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/user\/:user"
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                },
                {
                    "name": "Remove a User",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/user\/:user",
                            "query": [],
                            "raw": "http:\/\/localhost\/api\/user\/:user"
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": null,
                        "description": "",
                        "auth": {
                            "type": "noauth"
                        }
                    },
                    "response": []
                }
            ]
        }
    ],
    "auth": {
        "type": "noauth"
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`docs.json`**



## docs.openapi




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/docs.openapi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/docs.openapi"
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



### Request
<small class="badge badge-green">GET</small>
 **`docs.openapi`**



## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/sanctum/csrf-cookie"
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



### Request
<small class="badge badge-green">GET</small>
 **`sanctum/csrf-cookie`**



## Invoke the controller method.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/"
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


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='/docs'" />

        <title>Redirecting to /docs</title>
    </head>
    <body>
        Redirecting to <a href="/docs">/docs</a>.
    </body>
</html>
```

### Request
<small class="badge badge-green">GET</small>
 **`/`**

<small class="badge badge-black">POST</small>
 **`/`**

<small class="badge badge-darkblue">PUT</small>
 **`/`**

<small class="badge badge-purple">PATCH</small>
 **`/`**

<small class="badge badge-red">DELETE</small>
 **`/`**

<small class="badge badge-grey">OPTIONS</small>
 **`/`**




