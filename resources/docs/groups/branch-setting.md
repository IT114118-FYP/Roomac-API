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


> Example response (200):

```json
{
    "version": null,
    "name": "Default Settings",
    "active_at": null,
    "is_active": true,
    "settings": [
        {
            "id": "CLOSE_TIME",
            "data_type": "TIME",
            "default_value": "20:00:00",
            "created_at": "2021-01-22T10:12:24.000000Z",
            "updated_at": "2021-01-22T10:12:24.000000Z",
            "value": "20:00:00"
        },
        {
            "id": "MIN_CLIENT_UNLOCK",
            "data_type": "INTEGER",
            "default_value": "3",
            "created_at": "2021-01-22T10:12:25.000000Z",
            "updated_at": "2021-01-22T10:12:25.000000Z",
            "value": "3"
        },
        {
            "id": "OPEN_TIME",
            "data_type": "TIME",
            "default_value": "08:30:00",
            "created_at": "2021-01-22T10:12:24.000000Z",
            "updated_at": "2021-01-22T10:12:24.000000Z",
            "value": "08:30:00"
        },
        {
            "id": "RESOURCE_MINUTE_PER_SESSION",
            "data_type": "INTEGER",
            "default_value": "30",
            "created_at": "2021-01-22T10:12:25.000000Z",
            "updated_at": "2021-01-22T10:12:25.000000Z",
            "value": "30"
        },
        {
            "id": "TEST_BOOLEAN_FALSE",
            "data_type": "BOOLEAN",
            "default_value": "0",
            "created_at": "2021-01-22T10:12:27.000000Z",
            "updated_at": "2021-01-22T10:12:27.000000Z",
            "value": "0"
        },
        {
            "id": "TEST_BOOLEAN_TRUE",
            "data_type": "BOOLEAN",
            "default_value": "1",
            "created_at": "2021-01-22T10:12:26.000000Z",
            "updated_at": "2021-01-22T10:12:26.000000Z",
            "value": "1"
        },
        {
            "id": "TEST_VARCHAR",
            "data_type": "VARCHAR",
            "default_value": "Test String",
            "created_at": "2021-01-22T10:12:26.000000Z",
            "updated_at": "2021-01-22T10:12:26.000000Z",
            "value": "Test String"
        },
        {
            "id": "TIME_IN_ADVANCE",
            "data_type": "TIME",
            "default_value": "24:00:00",
            "created_at": "2021-01-22T10:12:24.000000Z",
            "updated_at": "2021-01-22T10:12:24.000000Z",
            "value": "24:00:00"
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


> Example response (200):

```json
{
    "active_version": null,
    "versions": [
        {
            "version": null,
            "name": "Default Settings"
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


> Example response (200):

```json
{
    "version": null,
    "name": "Default Settings",
    "active_at": 0,
    "is_active": true,
    "settings": [
        {
            "id": "CLOSE_TIME",
            "data_type": "TIME",
            "default_value": "20:00:00",
            "created_at": "2021-01-22T10:12:24.000000Z",
            "updated_at": "2021-01-22T10:12:24.000000Z",
            "value": "20:00:00"
        },
        {
            "id": "MIN_CLIENT_UNLOCK",
            "data_type": "INTEGER",
            "default_value": "3",
            "created_at": "2021-01-22T10:12:25.000000Z",
            "updated_at": "2021-01-22T10:12:25.000000Z",
            "value": "3"
        },
        {
            "id": "OPEN_TIME",
            "data_type": "TIME",
            "default_value": "08:30:00",
            "created_at": "2021-01-22T10:12:24.000000Z",
            "updated_at": "2021-01-22T10:12:24.000000Z",
            "value": "08:30:00"
        },
        {
            "id": "RESOURCE_MINUTE_PER_SESSION",
            "data_type": "INTEGER",
            "default_value": "30",
            "created_at": "2021-01-22T10:12:25.000000Z",
            "updated_at": "2021-01-22T10:12:25.000000Z",
            "value": "30"
        },
        {
            "id": "TEST_BOOLEAN_FALSE",
            "data_type": "BOOLEAN",
            "default_value": "0",
            "created_at": "2021-01-22T10:12:27.000000Z",
            "updated_at": "2021-01-22T10:12:27.000000Z",
            "value": "0"
        },
        {
            "id": "TEST_BOOLEAN_TRUE",
            "data_type": "BOOLEAN",
            "default_value": "1",
            "created_at": "2021-01-22T10:12:26.000000Z",
            "updated_at": "2021-01-22T10:12:26.000000Z",
            "value": "1"
        },
        {
            "id": "TEST_VARCHAR",
            "data_type": "VARCHAR",
            "default_value": "Test String",
            "created_at": "2021-01-22T10:12:26.000000Z",
            "updated_at": "2021-01-22T10:12:26.000000Z",
            "value": "Test String"
        },
        {
            "id": "TIME_IN_ADVANCE",
            "data_type": "TIME",
            "default_value": "24:00:00",
            "created_at": "2021-01-22T10:12:24.000000Z",
            "updated_at": "2021-01-22T10:12:24.000000Z",
            "value": "24:00:00"
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




