# Franklin For Commissioner - Campaign Website

A bilingual (English/Spanish) political campaign website for Franklin Gomez Flores' candidacy for Chatham County Commissioner - District 5.

## 📋 Table of Contents

- [Project Overview](#project-overview)
- [Project Structure](#project-structure)
- [Technologies Used](#technologies-used)
- [Features](#features)
- [Page Descriptions](#page-descriptions)
- [Setup Instructions](#setup-instructions)
- [Configuration](#configuration)
- [Security Notes](#security-notes)
- [Contributing](#contributing)

## 🎯 Project Overview

This campaign website serves as the primary online presence for Franklin Gomez Flores' campaign for County Commissioner. The site provides information about the candidate, campaign issues, and allows supporters to donate and sign up for updates.

### Key Features:
- **Bilingual Support**: Full English and Spanish versions
- **Responsive Design**: Mobile-friendly layout using Bootstrap 4
- **Donation System**: PayPal integration for campaign contributions
- **Contact Management**: SMS notifications via Twilio for supporter sign-ups
- **Issue Platform**: Detailed information on campaign positions

## 📁 Project Structure

```
franklin-project/
└── franklin/
    ├── index.html                      # Main homepage (English)
    ├── about.html                      # About the candidate page
    ├── issues.html                     # Campaign issues page
    ├── donations.html                  # Donation form page
    ├── thankyou.html                   # Thank you page after actions
    ├── send_sms.php                    # SMS notification handler
    ├── submitDonation.php              # Donation form processor
    │
    ├── ESP/                            # Spanish language version
    │   ├── index.html                  # Homepage (Spanish)
    │   ├── about.html                  # About page (Spanish)
    │   ├── issues.html                 # Issues page (Spanish)
    │   ├── donations.html              # Donations page (Spanish)
    │   ├── send_sms.php                # SMS handler (Spanish)
    │   └── [images]                    # Spanish version images
    │
    ├── checkout-one-time-payments/     # Stripe payment integration
    │   ├── client/                     # Client-side payment UI
    │   ├── server/                     # Server-side payment logic
    │   └── README.md                   # Payment setup documentation
    │
    ├── stripe-php-7.28.1/              # Stripe PHP SDK
    │   ├── lib/                        # Stripe library files
    │   ├── init.php                    # Stripe initialization
    │   └── [other files]               # SDK components
    │
    ├── twilio-php-master/              # Twilio PHP SDK
    │   └── src/                        # Twilio library files
    │
    ├── CSS Files
    │   ├── base.css                    # Base styles
    │   ├── global.css                  # Global styles
    │   ├── normalize.css               # CSS normalization
    │   └── example4.css                # Additional styles
    │
    ├── JavaScript Files
    │   ├── index.js                    # Main JavaScript
    │   ├── script.js                   # Additional scripts
    │   ├── l10n.js                     # Localization utilities
    │   ├── sample1.js                  # Sample code
    │   └── example4.js                 # Example scripts
    │
    ├── Images
    │   ├── frank_edit_blue_logo.png    # Campaign logo
    │   ├── headerIcon.ico              # Favicon
    │   ├── franklin_profile_*.jpg      # Profile photos
    │   ├── franklin_family.jpg         # Family photo
    │   ├── frank_comm_transparent.png  # Campaign graphics
    │   └── [other images]              # Various campaign images
    │
    └── PHP Files
        ├── index.php                   # PHP version of homepage
        └── client.php                  # Client utilities
```

## 🛠️ Technologies Used

### Frontend
- **HTML5** - Semantic markup
- **CSS3** - Custom styling with Bootstrap 4
- **JavaScript** - Client-side interactivity
- **Bootstrap 4.4.1** - Responsive framework
- **Font Awesome** - Icon library
- **jQuery 3.4.1** - DOM manipulation

### Backend
- **PHP** - Server-side processing
- **MySQL** - Database for donor information
- **Twilio API** - SMS notifications
- **PayPal** - Payment processing
- **Stripe API** - Alternative payment processing

### External Services
- **Twilio** - SMS messaging service
- **PayPal** - Donation processing
- **Stripe** - Payment gateway
- **MaxCDN** - Bootstrap CDN
- **Google CDN** - jQuery hosting

## ✨ Features

### 1. Bilingual Interface
- Complete English and Spanish versions
- Language switcher in navigation
- Consistent styling across both languages

### 2. Responsive Design
- Mobile-first approach
- Adaptive layouts for all screen sizes
- Touch-friendly navigation

### 3. Donation System
- Secure donation form
- Donor information collection
- Legal compliance checkboxes
- PayPal integration
- Database storage of donor details

### 4. Contact Management
- Supporter sign-up forms
- SMS notifications to campaign staff
- Spanish language indicator for Spanish contacts

### 5. Campaign Information
- Candidate biography
- Issue positions (collapsible accordion)
- Campaign updates
- Social media integration

## 📄 Page Descriptions

### English Version

#### `index.html`
- **Purpose**: Main landing page
- **Features**: 
  - Hero section with background image
  - Sign-up form for supporters
  - Quick overview of campaign issues
  - Donation call-to-action
  - Social media links

#### `about.html`
- **Purpose**: Candidate biography
- **Features**:
  - Personal story and background
  - Family photo
  - Educational history
  - Community involvement
  - Link to issues page

#### `issues.html`
- **Purpose**: Campaign platform and positions
- **Features**:
  - Collapsible accordion for each issue
  - Categories: Education, Jobs, Housing, Growth
  - Detailed policy positions
  - JavaScript-driven expand/collapse

#### `donations.html`
- **Purpose**: Donation form
- **Features**:
  - Personal information collection
  - Legal compliance checkboxes
  - Address validation
  - PayPal redirect

#### `thankyou.html`
- **Purpose**: Confirmation page
- **Features**:
  - Success message
  - Return to homepage link
  - Social media links

### Spanish Version (`ESP/`)
- Mirror structure of English version
- Translated content and UI elements
- Culturally appropriate messaging
- Same functionality as English version

## 🚀 Setup Instructions

### Prerequisites
- Web server (Apache/Nginx)
- PHP 7.0 or higher
- MySQL database
- Twilio account (for SMS)
- PayPal business account (for donations)

### Installation Steps

1. **Clone or download the project**
   ```bash
   git clone [repository-url]
   cd franklin-project/franklin
   ```

2. **Configure Database**
   - Create MySQL database named `FranklinFC`
   - Create `Donators` table:
     ```sql
     CREATE TABLE Donators (
         id INT AUTO_INCREMENT PRIMARY KEY,
         Name VARCHAR(255),
         Email VARCHAR(255),
         Occupation VARCHAR(255),
         Employer VARCHAR(255),
         Address VARCHAR(255),
         City VARCHAR(100),
         State VARCHAR(50),
         Zip VARCHAR(20),
         agree_terms TINYINT(1),
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```

3. **Configure Twilio**
   - Sign up at [Twilio.com](https://www.twilio.com)
   - Get Account SID and Auth Token
   - Update credentials in `send_sms.php` and `ESP/send_sms.php`

4. **Configure PayPal**
   - Set up PayPal business account
   - Create donation button
   - Update button ID in `submitDonation.php`

5. **Update Configuration Files**
   - Edit `submitDonation.php` with database credentials
   - Update Twilio credentials in SMS files
   - Set recipient phone numbers

6. **Set Permissions**
   ```bash
   chmod 755 *.php
   chmod 644 *.html
   ```

7. **Test the Installation**
   - Access `index.html` in browser
   - Test sign-up form
   - Test donation form (use PayPal sandbox)

## ⚙️ Configuration

### Database Configuration (`submitDonation.php`)
```php
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "FranklinFC";
```

### Twilio Configuration (`send_sms.php`)
```php
$account_sid = 'YOUR_ACCOUNT_SID';
$auth_token = 'YOUR_AUTH_TOKEN';
$twilio_number = '+1234567890';
$numbers_tosend = array('+1234567890', '+0987654321');
```

### PayPal Configuration (`submitDonation.php`)
```php
// Update the PayPal hosted button ID in the redirect URL
header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YOUR_BUTTON_ID");
```

## 🔒 Security Notes

### ⚠️ IMPORTANT: Security Vulnerabilities to Address

This codebase contains several security issues that **MUST** be addressed before production deployment:

1. **Exposed Credentials**
   - Database passwords are hardcoded in PHP files
   - Twilio credentials are in plain text
   - **Solution**: Use environment variables or secure config files

2. **SQL Injection Vulnerability**
   - `submitDonation.php` uses string concatenation for SQL queries
   - **Solution**: Implement prepared statements with parameterized queries
   ```php
   $stmt = $conn->prepare("INSERT INTO Donators (Name, Email, ...) VALUES (?, ?, ...)");
   $stmt->bind_param("sssssssss", $name, $email, ...);
   ```

3. **Missing Input Validation**
   - No server-side validation of form inputs
   - **Solution**: Add PHP validation and sanitization
   ```php
   $name = filter_var($_POST['inputname'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['inputEmail4'], FILTER_VALIDATE_EMAIL);
   ```

4. **No CSRF Protection**
   - Forms lack CSRF tokens
   - **Solution**: Implement CSRF token validation

5. **Error Handling**
   - Database errors are not properly handled
   - **Solution**: Add try-catch blocks and user-friendly error pages

### Recommended Security Improvements

1. **Use Environment Variables**
   ```php
   $account_sid = getenv('TWILIO_ACCOUNT_SID');
   $auth_token = getenv('TWILIO_AUTH_TOKEN');
   ```

2. **Implement Prepared Statements**
   ```php
   $stmt = $conn->prepare("INSERT INTO Donators (Name, Email) VALUES (?, ?)");
   $stmt->bind_param("ss", $name, $email);
   $stmt->execute();
   ```

3. **Add Input Validation**
   ```php
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       die("Invalid email format");
   }
   ```

4. **Enable HTTPS**
   - Use SSL certificate for all pages
   - Especially important for donation forms

5. **Secure File Permissions**
   ```bash
   chmod 600 config.php  # Config files
   chmod 644 *.html      # HTML files
   chmod 755 *.php       # PHP scripts
   ```

## 🤝 Contributing

### Code Style Guidelines
- Use 4 spaces for indentation
- Add comments for all major sections
- Follow existing naming conventions
- Test bilingual functionality

### Making Changes
1. Test changes on local environment
2. Verify both English and Spanish versions
3. Check responsive design on multiple devices
4. Ensure security best practices are followed

## 📞 Contact Information

**Campaign Email**: info@franklinforcommissioner.com
**Website**: https://franklinforcommissioner.com

## 📝 License

This is a political campaign website. All rights reserved.

---

## 🗂️ File Reference Guide

### Core HTML Pages
| File | Purpose | Key Features |
|------|---------|--------------|
| `index.html` | Homepage | Hero section, sign-up form, issue cards |
| `about.html` | Biography | Personal story, family photo, education |
| `issues.html` | Policy platform | Accordion UI, detailed positions |
| `donations.html` | Donation form | Personal info, legal compliance |
| `thankyou.html` | Confirmation | Success message, return link |

### PHP Backend
| File | Purpose | Dependencies |
|------|---------|--------------|
| `send_sms.php` | SMS notifications | Twilio API |
| `submitDonation.php` | Process donations | MySQL, PayPal |
| `client.php` | Client utilities | - |
| `index.php` | Dynamic homepage | - |

### Asset Categories
- **Profile Images**: `franklin_profile_*.jpg` (desktop/mobile versions)
- **Logos**: `frank_edit_blue_logo.png`, `comm_logo*.png`
- **Icons**: `headerIcon.ico`, `world-icon.png`
- **Campaign Photos**: `franklin_family.jpg`, `franklin_comm_*.jpg`

### Third-Party Libraries
- **Twilio PHP SDK**: SMS messaging functionality
- **Stripe PHP SDK**: Payment processing (alternative to PayPal)
- **Bootstrap 4**: Responsive framework (CDN)
- **jQuery 3.4.1**: JavaScript utilities (CDN)
- **Font Awesome**: Icon library (CDN)

---

**Last Updated**: November 17, 2025
**Project Status**: Active Campaign Website
