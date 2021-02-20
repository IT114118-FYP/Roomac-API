# Setting


## Retrieve all settings

Retrieve all settings.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/settings"
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
        "id": "CLOSE_TIME",
        "data_type": "TIME",
        "default_value": "20:00:00",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "MIN_CLIENT_UNLOCK",
        "data_type": "INTEGER",
        "default_value": "3",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "OPEN_TIME",
        "data_type": "TIME",
        "default_value": "08:30:00",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "RESOURCE_MINUTE_PER_SESSION",
        "data_type": "INTEGER",
        "default_value": "30",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "TEST_BOOLEAN_FALSE",
        "data_type": "BOOLEAN",
        "default_value": false,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "TEST_BOOLEAN_TRUE",
        "data_type": "BOOLEAN",
        "default_value": true,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "TEST_VARCHAR",
        "data_type": "VARCHAR",
        "default_value": "Test String",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": "TIME_IN_ADVANCE",
        "data_type": "TIME",
        "default_value": "24:00:00",
        "created_at": null,
        "updated_at": null
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/settings`**



## Retrieve a settings

Retrieve a settings.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/settings/OPEN_TIME" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/settings/OPEN_TIME"
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
    "id": "OPEN_TIME",
    "data_type": "TIME",
    "default_value": "08:30:00",
    "created_at": null,
    "updated_at": null
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/settings/{setting}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>setting</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the setting.




