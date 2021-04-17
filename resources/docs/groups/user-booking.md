# User Booking


## Retrieve all user&#039;s bookings

Retrieve all user&#039;s bookings. Example: /api/users/1/bookings?start=2021-01-24&amp;end=2021-01-30




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/users/{user}/bookings?start=placeat&end=mollitia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/{user}/bookings"
);

let params = {
    "start": "placeat",
    "end": "mollitia",
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
 **`api/users/{user}/bookings`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>start</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    query start time in Y-m-d format. Defaults to 2021-01-13.

<code><b>end</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    query end time in Y-m-d format. Defaults to 2021-01-15.




