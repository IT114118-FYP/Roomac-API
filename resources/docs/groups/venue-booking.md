# Venue Booking


## Retrieve all venue&#039;s bookings timetable




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/venues/{venue}/bookings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues/{venue}/bookings"
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
    "interval": 30,
    "bookings": {
        "reserved": [
            {
                "id": 1,
                "user_id": 2,
                "venue_id": 1,
                "branch_setting_version_id": null,
                "start_time": "2020-12-14T09:00:00.000000Z",
                "end_time": "2020-12-14T10:30:00.000000Z",
                "created_at": "2020-12-14T00:17:48.000000Z",
                "updated_at": "2020-12-14T00:17:48.000000Z"
            },
            {
                "id": 2,
                "user_id": 2,
                "venue_id": 1,
                "branch_setting_version_id": null,
                "start_time": "2020-12-14T10:30:00.000000Z",
                "end_time": "2020-12-14T12:30:00.000000Z",
                "created_at": "2020-12-14T00:17:48.000000Z",
                "updated_at": "2020-12-14T00:17:48.000000Z"
            },
            {
                "id": 5,
                "user_id": 2,
                "venue_id": 1,
                "branch_setting_version_id": null,
                "start_time": "2020-12-15T13:00:00.000000Z",
                "end_time": "2020-12-15T14:30:00.000000Z",
                "created_at": "2020-12-14T00:17:50.000000Z",
                "updated_at": "2020-12-14T00:17:50.000000Z"
            },
            {
                "id": 6,
                "user_id": 2,
                "venue_id": 1,
                "branch_setting_version_id": null,
                "start_time": "2020-12-15T15:30:00.000000Z",
                "end_time": "2020-12-15T16:30:00.000000Z",
                "created_at": "2020-12-14T00:17:51.000000Z",
                "updated_at": "2020-12-14T00:17:51.000000Z"
            }
        ],
        "unavailable": []
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/venues/{venue}/bookings`**




