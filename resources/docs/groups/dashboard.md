# Dashboard


## Get Dashboard data




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/dashboard" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/dashboard"
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


> Example response (200, success):

```json
{
    "count": {
        "user": 5,
        "branch": 10,
        "category": 3,
        "resource": 19,
        "active_bookings": 1,
        "total_bookings": 10
    },
    "active_bookings": [
        {
            "id": 17,
            "user_id": 2,
            "resource_id": 4,
            "branch_setting_version_id": null,
            "number": "RM-2021041300017",
            "start_time": "2021-04-13T13:00:00",
            "end_time": "2021-04-13T13:30:00",
            "checkin_time": null,
            "created_at": "2021-04-10T17:22:47.000000Z",
            "updated_at": "2021-04-10T17:22:47.000000Z"
        }
    ]
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/dashboard`**




