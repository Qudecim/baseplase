###### Todo:
- Category and subcategory
- Hooks event (PubSub pattern)
- Integrations interface 
- Send email  
- ElasticSearch

###### Maybe:
- Resource or Responder
- Warehouses and stock


### Events:
###### Order:
- Created and created with some fields
- Change some fields
- Change status
- The order exists for a certain number of days
- The order is in status fo a certain number of days
###### Shipment:
- Shipment has been created
- Shipment has been deleted
- The courier's parcel status has been changed
###### Marketplace
- The FBA return has been registered
- Order cancelled
- Cancel request (Shop)

### Listeners:
###### Order:
- Change status
- Modify order
###### Message:
- Send email, sms, telegram etc.
###### Other:
- Call URL
