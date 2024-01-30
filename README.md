# NoodleBeat

## Overview

NoodleBeat is a social media website designed for up-and-coming musical artists. It provides a platform for users to create profiles, upload their music, discover new tracks, and engage with the community. This project is built using HTML, JavaScript, PHP, CSS, and SQL technologies. This site was live starting in December of 2018 and was discontinued in February of 2020. At its peak it had over 150 users and 100 original songs posted. Now it can be run locally on any machine. 

## Getting Started

### Clone the Repository

```bash
# clone to wherever you need to in order to run on local server
git clone https://github.com/andyboulle/NoodleBeat.git
cd NoodleBeat
```

### Set Up Database

- Create a new database in your local MySQL server.
- Import the `Database/database.sql` file into your server to create the necessary database.

### Configure Database Connection

- Open the `PHP/dbh.php` file and update the database connection details (host, username, password, and database name).

### Run on Localhost

- Start your local server (e.g., Apache or Nginx).
- Navigate to `http://localhost/noodlebeat` in your web browser.

## Page - Page files

1. **Home:**
   - Home page displaying the most recently uploaded songs.
     
2. **Browse:**
   - Discover and explore new music uploaded by other artists.

3. **Register:**
   - Create a new NoodleBeat account.

4. **Sign In:**
   - Log in to your existing NoodleBeat account.
  
5. **Profile:**
   - View and edit your user profile.

6. **Upload:**
   - Upload your own music tracks.

7. **Contact:**
   - Connect with NoodleBeat through the contact form.

8. **Terms:**
   - Terms and conditions page.
  
9. **Misc:**
   - Miscellaneous page for additional information or features.

## PHP - Action files used throughout the website

1. **Create Account:**
   - Register for a NoodleBeat account to start using the platform.
  
2. **Sign In:**
   - Log in to your NoodleBeat account.

3. **Sign Out:**
   - Log out of your NoodleBeat account.

4. **Upload Songs:**
   - Artists can upload their music tracks to share with the community.
    
5. **Like Songs:**
   - Users can like songs to show appreciation for other artists' work.

6. **Delete Songs:**
   - Artists can delete their uploaded songs.

## Contributing

If you would like to contribute to NoodleBeat, feel free to fork the repository and submit pull requests.


---

Thank you for using NoodleBeat! If you encounter any issues or have suggestions for improvement, please open an issue on the GitHub repository. Enjoy connecting with fellow musicians and sharing your passion for music!
