# Branch Booking


## Retrieve all branch&#039;s bookings

Retrieve all branch&#039;s bookings. Example: /api/branches/1/bookings?start=2021-01-24&amp;end=2021-01-30




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/branches/{branch}/bookings?start=ipsa&end=et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/branches/{branch}/bookings"
);

let params = {
    "start": "ipsa",
    "end": "et",
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
 **`api/branches/{branch}/bookings`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>start</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    query start time in Y-m-d format. Defaults to 2021-01-13.

<code><b>end</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    query end time in Y-m-d format. Defaults to 2021-01-15.




