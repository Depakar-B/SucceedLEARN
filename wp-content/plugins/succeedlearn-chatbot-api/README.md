# SucceedLearn Chatbot API Plugin

A unified WordPress plugin that combines a beautiful chatbot interface with REST API functionality for courses management.

## Features

- ✅ **Beautiful Chatbot UI** - Lottie animations, responsive design
- ✅ **AMP Compatible** - Works on AMP pages with AMP components
- ✅ **REST API** - Full REST API endpoints for chatbot and courses
- ✅ **Course Management** - Add, edit, delete courses via API or JSON files
- ✅ **Q&A System** - Easy-to-manage question-answer pairs
- ✅ **WordPress Integration** - Native WordPress REST API
- ✅ **Security** - Rate limiting, input sanitization, nonce verification

## Installation

1. Copy the `succeedlearn-chatbot-api` folder to `/wp-content/plugins/`
2. Activate the plugin in WordPress Admin → Plugins
3. Configure settings: Settings → SucceedLearn Chatbot
4. The chatbot will appear on your website automatically

## REST API Endpoints

**Base URL:** `/wp-json/succeedlearn-chatbot-api/v1`

### Chatbot
- **POST** `/chat` - Send message to chatbot
  ```json
  {
    "message": "What courses do you offer?",
    "user_id": 123
  }
  ```

### Courses
- **GET** `/courses` - Get all courses
- **GET** `/courses/{id}` - Get single course
- **POST** `/courses` - Create course (auth required)
- **PUT** `/courses/{id}` - Update course (auth required)
- **DELETE** `/courses/{id}` - Delete course (auth required)
- **GET** `/courses/search?q=term` - Search courses

## Adding Content

### Method 1: Edit JSON Files (Easiest)

**Add Courses:** Edit `data/courses.json`
```json
{
  "id": 3,
  "title": "New Course",
  "description": "Course description",
  "price": 299.99,
  "category": "Category",
  "duration": "4 weeks",
  "certificate": true
}
```

**Add Q&A:** Edit `data/qa-data.json`
```json
{
  "question": "your question",
  "answer": "your answer"
}
```

### Method 2: Use REST API

**Create Course:**
```bash
curl -X POST "https://yoursite.com/wp-json/succeedlearn-chatbot-api/v1/courses" \
  -H "Content-Type: application/json" \
  -H "X-API-Key: your-key" \
  -d '{
    "title": "New Course",
    "description": "Description",
    "price": 299.99,
    "category": "Compliance",
    "duration": "4 weeks",
    "certificate": true
  }'
```

## Testing

### Test Chatbot API
```
POST /wp-json/succeedlearn-chatbot-api/v1/chat
Body: {"message": "What courses do you offer?"}
```

### Test Courses API
```
GET /wp-json/succeedlearn-chatbot-api/v1/courses
```

## File Structure

```
succeedlearn-chatbot-api/
├── succeedlearn-chatbot-api.php  # Main plugin file
├── includes/
│   └── chatbot-handler.php        # Message processing logic
├── assets/
│   ├── css/
│   │   └── chatbot.css           # Styles
│   ├── js/
│   │   ├── chatbot.js            # Frontend JavaScript
│   │   └── admin-settings.js     # Admin settings
│   ├── vendor/
│   │   └── lottie.min.js         # Lottie animation library
│   └── lottie/
│       ├── live-chatbot.json     # Toggle animation
│       └── robot-saludo.json     # Header animation
└── data/
    ├── courses.json              # Courses data
    └── qa-data.json              # Q&A pairs
```

## Configuration

Go to **Settings → SucceedLearn Chatbot** to configure:
- Lottie animation URLs
- Chat header title
- Welcome message

## AMP (Accelerated Mobile Pages) Support

The chatbot automatically detects AMP pages and renders an AMP-compatible version using:
- `amp-bind` for state management (chat open/close)
- `amp-form` for message submission
- REST API endpoints instead of AJAX

**How it works:**
- The plugin automatically detects AMP pages using WordPress AMP plugin functions
- On AMP pages, it renders a simplified version without JavaScript dependencies
- Uses SVG icons instead of Lottie animations for better AMP compatibility
- All functionality works the same, just optimized for AMP

**AMP Detection:**
The plugin checks for AMP in this order:
1. `amp_is_request()` function (AMP plugin)
2. `?amp=1` query parameter
3. `is_amp_endpoint()` function (AMP plugin)

**Note:** For full conversation history on AMP pages, consider implementing server-side session management if needed.

## API Authentication

For authenticated endpoints (POST/PUT/DELETE courses), you need to:
1. Be logged in as WordPress admin, OR
2. Include `X-API-Key` header with valid API key

## Support

For issues or questions, contact support@succeedtech.com

## License

GPL v2 or later
