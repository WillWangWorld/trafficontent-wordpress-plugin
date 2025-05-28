


# Trafficontent WordPress Connector

**Trafficontent Connector** is a WordPress plugin that connects your WordPress site to [Trafficontent](https://trafficontent.com), enabling automatic publishing of AI-generated blog posts.

## ✨ Features

- Secure API key authentication
- Manual sync button to fetch latest posts
- Automatically publishes new blog posts
- Modular structure for future extensions (preview, scheduling, etc.)

## 🚀 Installation

1. Download or clone this repo:
   ```bash
   git clone https://github.com/your-username/trafficontent-wordpress-plugin.git
   ```
2. Upload the folder `trafficontent-connector` to your WordPress site under `/wp-content/plugins/`
3. Activate the plugin from the **Plugins** menu in WordPress
4. Go to **Trafficontent → API Key Settings** in your admin sidebar
5. Paste your API key from [trafficontent.com](https://trafficontent.com) and save

## 🔄 Manual Sync

Navigate to **Trafficontent → Sync Status** and click the **Sync Now** button to fetch and publish new blog content immediately.

## 🧩 Folder Structure

```
trafficontent-wordpress-plugin/
├── trafficontent-connector.php   # Main plugin file
├── admin/
│   └── settings-page.php         # Admin page UIs
├── includes/
│   ├── api-client.php            # API connection logic
│   └── sync-posts.php            # Post creation logic
├── assets/
│   └── icon.svg                  # (Optional) admin icon
├── README.md
├── README.txt                    # WordPress.org version
```

## 📄 License

This plugin is licensed under the [GPLv2](https://www.gnu.org/licenses/gpl-2.0.html) or later.

## 🙋‍♀️ Support

For questions or help, visit [trafficontent.com](https://trafficontent.com) or email support@trafficontent.com.