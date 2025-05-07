Magento 2 – Sort Out-of-Stock Products to Bottom of Category Page

This Magento 2 module moves out-of-stock products to the bottom of category product listings after filters are applied by the customer. It ensures that in-stock items are always prioritized and more visible to users, improving customer experience and potentially increasing conversions.

*******************************************************
🔥 Key Features

- ✅ Automatically moves **out-of-stock products** to the **bottom** of category product lists  
- ✅ Works **after** layered navigation filters and sorting are applied  
- ✅ Fully compatible with **Magento's default sorting options**  
- ✅ Includes a **backend configuration setting** to enable/disable the feature  
- ✅ Designed to be **upgrade-proof** – no core code overrides or rewrites
  
*******************************************************
🔧 Configuration

To enable or disable the feature:

   1. Go to Admin Panel > Stores > Configuration > Catalog > Sort Stock Setting
   2. Set "Enable Sorting Out of Stock to Bottom" to Yes or No
   3. Click Save Config
   4. Clear cache if necessary

*******************************************************
⚙️ How It Works

   1. This module uses a plugin on Magento\Catalog\Block\Product\ListProduct::getLoadedProductCollection() to intercept the final product collection rendered on the category page.
   2. It separates in-stock and out-of-stock products and merges them back, placing out-of-stock ones at the end.
   3. The replacement is done using PHP Reflection, as the product collection does not provide a public method to reset items.
   4. The logic respects filters and sorting applied by the customer (e.g., filter by attribute, sort by price/name).
