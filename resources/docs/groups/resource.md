# Resource


## Import resources

Import resources.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/resources/import" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\hkdse\AppData\Local\Temp\php4F02.tmp" 
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/import"
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
 **`api/resources/import`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>file</b></code>&nbsp; <small>file</small>     <br>
    



## Export resources

Export resources.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources/export?format=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/export"
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
 **`api/resources/export`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>format</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx.



## Remove multiple resources

Remove multiple resources.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/resources" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"ids":"{\"ids\": [1, 2]}"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources"
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
 **`api/resources`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>ids</b></code>&nbsp; <small>array</small>     <br>
    Array of the resources' id



## Reset resources

Remove all resources.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/resources/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/reset"
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
 **`api/resources/reset`**



## Retrieve all resources

Retrieve all resources.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources"
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
        "branch_id": "ST",
        "category_id": 1,
        "tos_id": 1,
        "number": "IT-417A",
        "title_en": "Interview Room",
        "title_hk": "接見室",
        "title_cn": "接见室",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453326\/aqmyrwsqxucpt5ql5dwj.jpg",
        "min_user": 1,
        "max_user": 20,
        "opening_time": "08:00:00",
        "closing_time": "15:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 1,
            "title_en": "Classroom",
            "title_hk": "課室",
            "title_cn": "教室",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610342834\/riak0mox4pqzxesenegs.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 2,
        "branch_id": "ST",
        "category_id": 1,
        "tos_id": 1,
        "number": "IT-421B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 1,
            "title_en": "Classroom",
            "title_hk": "課室",
            "title_cn": "教室",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610342834\/riak0mox4pqzxesenegs.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 3,
        "branch_id": "CW",
        "category_id": 1,
        "tos_id": 1,
        "number": "CS-442",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "CW",
            "title_en": "Chai Wan",
            "title_hk": "柴灣",
            "title_cn": "柴湾",
            "lat": "22.27184971",
            "lng": "114.23967000",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 1,
            "title_en": "Classroom",
            "title_hk": "課室",
            "title_cn": "教室",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610342834\/riak0mox4pqzxesenegs.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 4,
        "branch_id": "CW",
        "category_id": 1,
        "tos_id": 1,
        "number": "CS-404",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "CW",
            "title_en": "Chai Wan",
            "title_hk": "柴灣",
            "title_cn": "柴湾",
            "lat": "22.27184971",
            "lng": "114.23967000",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 1,
            "title_en": "Classroom",
            "title_hk": "課室",
            "title_cn": "教室",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610342834\/riak0mox4pqzxesenegs.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 5,
        "branch_id": "HW",
        "category_id": 2,
        "tos_id": 1,
        "number": "CS-332B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "HW",
            "title_en": "Haking Wong",
            "title_hk": "黃克競",
            "title_cn": "黄克竞",
            "lat": "22.33551569",
            "lng": "114.15235304",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 2,
            "title_en": "Library",
            "title_hk": "圖書館",
            "title_cn": "图书馆",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610343016\/ca8zmlcwcbcspgw6sked.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 6,
        "branch_id": "TM",
        "category_id": 2,
        "tos_id": 1,
        "number": "CS-N108B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "TM",
            "title_en": "Tuen Mun",
            "title_hk": "屯門",
            "title_cn": "屯门",
            "lat": "22.39311344",
            "lng": "113.96646235",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 2,
            "title_en": "Library",
            "title_hk": "圖書館",
            "title_cn": "图书馆",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610343016\/ca8zmlcwcbcspgw6sked.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 7,
        "branch_id": "TM",
        "category_id": 2,
        "tos_id": 1,
        "number": "IT-427B",
        "title_en": "",
        "title_hk": "",
        "title_cn": "",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453111\/qqz4jdu2hyielwrjl6zj.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "21:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "TM",
            "title_en": "Tuen Mun",
            "title_hk": "屯門",
            "title_cn": "屯门",
            "lat": "22.39311344",
            "lng": "113.96646235",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 2,
            "title_en": "Library",
            "title_hk": "圖書館",
            "title_cn": "图书馆",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610343016\/ca8zmlcwcbcspgw6sked.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 8,
        "branch_id": "ST",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-001",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 9,
        "branch_id": "ST",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-002",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 10,
        "branch_id": "ST",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-003",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 11,
        "branch_id": "ST",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-004",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 12,
        "branch_id": "ST",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-005",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 13,
        "branch_id": "ST",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-006",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 14,
        "branch_id": "ST",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-007",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "ST",
            "title_en": "Sha Tin",
            "title_hk": "沙田",
            "title_cn": "沙田",
            "lat": "22.39041332",
            "lng": "114.19803821",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 15,
        "branch_id": "TM",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-001",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "TM",
            "title_en": "Tuen Mun",
            "title_hk": "屯門",
            "title_cn": "屯门",
            "lat": "22.39311344",
            "lng": "113.96646235",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 16,
        "branch_id": "TM",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-002",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "TM",
            "title_en": "Tuen Mun",
            "title_hk": "屯門",
            "title_cn": "屯门",
            "lat": "22.39311344",
            "lng": "113.96646235",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 17,
        "branch_id": "TM",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-003",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "TM",
            "title_en": "Tuen Mun",
            "title_hk": "屯門",
            "title_cn": "屯门",
            "lat": "22.39311344",
            "lng": "113.96646235",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 18,
        "branch_id": "TM",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-004",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "TM",
            "title_en": "Tuen Mun",
            "title_hk": "屯門",
            "title_cn": "屯门",
            "lat": "22.39311344",
            "lng": "113.96646235",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    },
    {
        "id": 19,
        "branch_id": "TM",
        "category_id": 3,
        "tos_id": 1,
        "number": "PC-005",
        "title_en": "Computer Desk",
        "title_hk": "電腦桌",
        "title_cn": "电脑桌",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611590696\/e2mxmh5fcbbkcudch59s.jpg",
        "min_user": 2,
        "max_user": 10,
        "opening_time": "08:00:00",
        "closing_time": "18:00:00",
        "created_at": null,
        "updated_at": null,
        "branch": {
            "id": "TM",
            "title_en": "Tuen Mun",
            "title_hk": "屯門",
            "title_cn": "屯门",
            "lat": "22.39311344",
            "lng": "113.96646235",
            "created_at": null,
            "updated_at": null
        },
        "category": {
            "id": 3,
            "title_en": "Computer Room",
            "title_hk": "電腦房",
            "title_cn": "电脑房",
            "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1611592893\/o72p9styjrmdhbrf77zw.jpg",
            "created_at": null,
            "updated_at": null
        },
        "tos": {
            "id": 1,
            "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
            "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
            "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
            "created_at": null,
            "updated_at": null
        }
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/resources`**



## Add a resource

Add a resource.




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/resources" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources"
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
 **`api/resources`**



## Retrieve a resource

Retrieve a resource.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/1"
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
    "id": 1,
    "branch_id": "ST",
    "category_id": 1,
    "tos_id": 1,
    "number": "IT-417A",
    "title_en": "Interview Room",
    "title_hk": "接見室",
    "title_cn": "接见室",
    "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1608453326\/aqmyrwsqxucpt5ql5dwj.jpg",
    "min_user": 1,
    "max_user": 20,
    "opening_time": "08:00:00",
    "closing_time": "15:00:00",
    "created_at": null,
    "updated_at": null,
    "branch": {
        "id": "ST",
        "title_en": "Sha Tin",
        "title_hk": "沙田",
        "title_cn": "沙田",
        "lat": "22.39041332",
        "lng": "114.19803821",
        "created_at": null,
        "updated_at": null
    },
    "category": {
        "id": 1,
        "title_en": "Classroom",
        "title_hk": "課室",
        "title_cn": "教室",
        "image_url": "https:\/\/res.cloudinary.com\/hkzbjzedn\/image\/upload\/v1610342834\/riak0mox4pqzxesenegs.jpg",
        "created_at": null,
        "updated_at": null
    },
    "tos": {
        "id": 1,
        "tos_en": "* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.\n* Users are expected to behave in these bookable spaces in accordance with the VTC's code of conduct: [https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.",
        "tos_hk": "* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。\n* 用戶應按照VTC的行為準則：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。",
        "tos_cn": "* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。\n* 用户应遵循VTC的行为规范：[https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf](https:\/\/www.vtc.edu.hk\/ti\/mhti\/hp2011\/ivesite\/html\/tc\/campus\/OHD_Handbook_AY20-21.pdf)\n* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。",
        "created_at": null,
        "updated_at": null
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/resources/{resource}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>resource</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    string required The ID of the resource.



## Update a resource

Update a resource.




> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}"
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
 **`api/resources/{resource}`**

<small class="badge badge-purple">PATCH</small>
 **`api/resources/{resource}`**



## Remove a resource

Remove a resource.




> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}"
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
 **`api/resources/{resource}`**




