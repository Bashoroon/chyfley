<?php

class Chyfley
{
    private $conn;

    // Constructor to establish database connection
    public function __construct()
    {
        $this->connectDatabase();
    }

    // Function to connect to the database
    private function connectDatabase()
    {
        $host = "localhost";
        $username = "bashoroon";
        $password = "foyetola";
        $database = "local_db";

        $this->conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Function to add a gallery
    public function add_gallery()
    {
        $title = $this->conn->real_escape_string($_POST['title']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $category = $this->conn->real_escape_string($_POST['category']);



        // Use $_FILES instead of $_POST for file uploads
        $images = $_FILES['images'];

        $uploadedFiles = [];

        foreach ($images['name'] as $key => $name) {
            // Generate a random number as a prefix
            $randomNumber = rand(1000, 9999);

            // Add random number prefix to the file name
            $newFileName = $randomNumber . '_' . $name;

            // File upload handling for each file
            $targetDir = "../assets/img/gallery/";
            $targetFile = $targetDir . basename($newFileName);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if the file is an actual image
            $check = getimagesize($images['tmp_name'][$key]);
            if ($check === false) {
                return "Error: File is not an image.";
            }

            // Check file size (1MB limit, adjust if needed)
            if ($images['size'][$key] > 1 * 1024 * 1024) {
                return "Error: File size exceeds 1MB limit.";
            }

            // Allow certain file formats
            $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($imageFileType, $allowedExtensions)) {
                return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            }

            // Move the file to the target directory
            if (move_uploaded_file($images['tmp_name'][$key], $targetFile)) {
                // File upload successful, store the uploaded file paths
                $uploadedFiles[] = $targetFile;
            } else {
                return "Error: File upload failed.";
            }
        }

        // Files uploaded successfully, now insert gallery details into the database using prepared statements
        $sql = "INSERT INTO gallery (title, description, image_path, category) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        foreach ($uploadedFiles as $file) {
            $stmt->bind_param("ssss", $title, $description, $file, $category);
            if ($stmt->execute() === FALSE) {
                return "Error: " . $stmt->error;
            }
        }

        $stmt->close();
        header('location:add-gallery?s');
        return "Gallery added successfully";
    }



    // Add Gallery Categories

    public function add_gallery_cat()
    {
        $cat = $this->conn->real_escape_string($_POST['category']);
        $sql = "INSERT INTO gallery_categories (category_name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $cat);

        if ($stmt->execute() === FALSE) {
            return "Error: " . $stmt->error;
        }
        $stmt->close();
        header('location:add-gallery.php?c');
        return "Category added successfully";
    }


    // function to show gallery category
    public function gallery_category()
    {
        $data = array();
        $sqlCat = $this->conn->query("Select * from gallery_categories");
        while ($Cat = mysqli_fetch_assoc($sqlCat)) {
            $data[] = $Cat;
        };
        return $data;
    }

    // function to show 5 recent gallery
    public function recent_gallery()
    {
        $data = array();
        $sqlGallery = $this->conn->query("Select * from gallery order by id desc limit 2");
        while ($gallery = mysqli_fetch_assoc($sqlGallery)) {
            $data[] = $gallery;
        };
        return $data;
    }

    // Function to show student gallery

    public function student_gallery()
    {
        $data = array();
        $sqlAllGallery = $this->conn->query("Select * from gallery where category = 'student'  ");
        while ($allGallery = mysqli_fetch_assoc($sqlAllGallery)) {
            $data[] = $allGallery;
        };
        return $data;
    }


    // Function to show all  gallery

    public function all_gallery()
    {
        $data = array();
        $sqlAllGallery = $this->conn->query("Select * from gallery  ");
        while ($allGallery = mysqli_fetch_assoc($sqlAllGallery)) {
            $data[] = $allGallery;
        };
        return $data;
    }
 // Function to show all friday

 public function friday_gallery()
 {
     $data = array();
     $sqlAllGallery = $this->conn->query("Select * from gallery where category = 'Friday'  ");
     while ($allGallery = mysqli_fetch_assoc($sqlAllGallery)) {
         $data[] = $allGallery;
     };
     return $data;
 }

    // Function to show VS gallery

    public function vs_gallery()
    {
        $data = array();
        $sqlAllGallery = $this->conn->query("Select * from gallery where category = 'valedictory service'  ");
        while ($allGallery = mysqli_fetch_assoc($sqlAllGallery)) {
            $data[] = $allGallery;
        };
        return $data;
    }

     // Function to show cultural gallery

     public function uncategorized_gallery()
     {
         $data = array();
         $sqlAllGallery = $this->conn->query("Select * from gallery where category = 'uncategorized'  ");
         while ($allGallery = mysqli_fetch_assoc($sqlAllGallery)) {
             $data[] = $allGallery;
         };
         return $data;
     }


 // Function to show culutural gallery

     public function cultural_gallery()
     {
         $data = array();
         $sqlAllGallery = $this->conn->query("Select * from gallery where category = 'Cultural Day'  ");
         while ($allGallery = mysqli_fetch_assoc($sqlAllGallery)) {
             $data[] = $allGallery;
         };
         return $data;
     }

     // Function to show culutural gallery

     public function facilities_gallery()
     {
         $data = array();
         $sqlAllGallery = $this->conn->query("Select * from gallery where category = 'Facilities'  ");
         while ($allGallery = mysqli_fetch_assoc($sqlAllGallery)) {
             $data[] = $allGallery;
         };
         return $data;
     }



    // function to update gallery

    public function edit_gallery($id)
    {

        $sqlEditGallery = $this->conn->query("Select * from gallery where id ='$id'  ");
        $editGallery = mysqli_fetch_assoc($sqlEditGallery);
        return $editGallery;
    }


    // function to delete
    public function delete_gallery()
    {
        $id = $_POST['id'];

        $sqldeleteGallery = $this->conn->query("delete from gallery where id ='$id'  ");
        header('location:view-all-gallery.php?s');
    }



    //funtion to add event

    public function add_event()
    {
        $title = $this->conn->real_escape_string($_POST['title']);
        $location = $this->conn->real_escape_string($_POST['location']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $time = $this->conn->real_escape_string($_POST['time']);
        $date = $this->conn->real_escape_string($_POST['date']);
        $category = $this->conn->real_escape_string($_POST['category']);


        // Use $_FILES instead of $_POST for file uploads
        $images = $_FILES['images'];

        $uploadedFiles = [];



        foreach ($images['name'] as $key => $name) {
            $randomNumber = rand(1000, 9999);
            $newFileName = $randomNumber . '_' . $name;
            $targetDir = "../assets/img/event/";
            $targetFile = $targetDir . basename($newFileName);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $check = getimagesize($images['tmp_name'][$key]);
            if ($check === false) {
                return "Error: File is not an image.";
            }

            if ($images['size'][$key] > 1 * 1024 * 1024) {
                return "Error: File size exceeds 1MB limit.";
            }

            $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($imageFileType, $allowedExtensions)) {
                return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            }

            if (move_uploaded_file($images['tmp_name'][$key], $targetFile)) {
                $uploadedFiles[] = $targetFile;
                print_r($uploadedFiles);
            } else {
                return "Error: File upload failed.";
            }
        }

        $imagePaths = implode(",", $uploadedFiles);


        // Assuming the ID column in your events table is named 'id'
        $sql = "INSERT INTO events (title, description, location, event_date, event_time,  image_path, category) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bind_param("sssssss", $title, $description, $location, $date, $time, $imagePaths, $category);
    
        if ($stmt->execute() === FALSE) {
            return "Error: " . $stmt->error;
        }else {
            $stmt->close();
        
            // Redirect after the database operation
            header('location:add-event.php?s');
        
            // Return success message if needed
            return "Event added successfully";
        }
    }

    // Function to show all Event

    public function all_event()
    {
        $data = array();
    
        // Select all rows except the first and last
        $sqlAllEvent = $this->conn->query("SELECT * FROM events WHERE event_id NOT IN (SELECT MIN(event_id) FROM events UNION SELECT MAX(event_id) FROM events)");
    
        while ($allEvent = mysqli_fetch_assoc($sqlAllEvent)) {
            $data[] = $allEvent;
        };
    
        return $data;
    }
    

    // Recent 5 event
    public function recent_event()
    {
        $data = array();
        $sqlEvent = $this->conn->query("Select * from events order by event_id desc limit 5");
        while ($Event = mysqli_fetch_assoc($sqlEvent)) {
            $data[] = $Event;
        };
        return $data;
    }


    // Query one event
    public function an_event()
    {

        $sqlEvent = $this->conn->query("Select * from events order by event_id desc limit 1");
        $event = mysqli_fetch_assoc($sqlEvent);
        return $event;
    }
    


     // Query Detailsevent
     public function detailed_event($id)
     {
 
         $sqlEvent = $this->conn->query("Select * from events where event_id= '$id'");
         $event = mysqli_fetch_assoc($sqlEvent);
         return $event;
     }

    // event for home event
    public function home_event()
    {
        $data =[];
        $sqlEvent = $this->conn->query("Select * from events order by event_id desc limit 2");
        while($event = mysqli_fetch_assoc($sqlEvent)){
            $data[] = $event;
        }
        return $data;
    }


    // Add Event Categories

    public function add_event_cat()
    {
        $cat = $this->conn->real_escape_string($_POST['category']);
        $sql = "INSERT INTO event_categories (category_name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $cat);

        if ($stmt->execute() === FALSE) {
            return "Error: " . $stmt->error;
        }
        $stmt->close();
        header('location:add-event.php?c');
        return "Category added successfully";
    }


    // function to show event category
    public function event_category()
    {
        $data = array();
        $sqlCat = $this->conn->query("Select * from event_categories");
        while ($Cat = mysqli_fetch_assoc($sqlCat)) {
            $data[] = $Cat;
        };
        return $data;
    }


    // function to edit event

    public function edit_event($id)
    {

        $sqlEditEvent = $this->conn->query("Select * from events where event_id ='$id'  ");
        $editEvent = mysqli_fetch_assoc($sqlEditEvent);
        return $editEvent;
    }

    // function for update event
    public function update_event()
    {
        $title = $this->conn->real_escape_string($_POST['title']);
        $location = $this->conn->real_escape_string($_POST['location']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $time = $this->conn->real_escape_string($_POST['time']);
        $date = $this->conn->real_escape_string($_POST['date']);
        $category = $this->conn->real_escape_string($_POST['category']);
        $id = $_POST['id'];
    
        // Use $_FILES instead of $_POST for file uploads
        $images = isset($_FILES['images']) ? $_FILES['images'] : [];
    
        $uploadedFiles = [];
    
        if (!empty($images)) {
            foreach ($images['name'] as $key => $name) {
                $randomNumber = rand(1000, 9999);
                $newFileName = $randomNumber . '_' . $name;
                $targetDir = "../assets/img/event/";
                $targetFile = $targetDir . basename($newFileName);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
                $check = getimagesize($images['tmp_name'][$key]);
                if ($check === false) {
                    return "Error: File is not an image.";
                }
    
                if ($images['size'][$key] > 1 * 1024 * 1024) {
                    return "Error: File size exceeds 1MB limit.";
                }
    
                $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
                if (!in_array($imageFileType, $allowedExtensions)) {
                    return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
                }
    
                if (move_uploaded_file($images['tmp_name'][$key], $targetFile)) {
                    $uploadedFiles[] = $targetFile;
                } else {
                    return "Error: File upload failed.";
                }
            }
        }
    
        // Assuming $title, $description, $time, $date, $location, $category are your updated values
        $sql = "UPDATE events SET title=?, description=?, event_time=?, event_date=?, location=?, image_path=?, category=? WHERE event_id=?";
        $stmt = $this->conn->prepare($sql);
    
        // If $uploadedFiles is empty, get existing image paths for the event
        $existingImagePaths = ""; // Replace this with the actual variable or array holding existing image paths
    
        $imagePaths = !empty($uploadedFiles) ? implode(",", $uploadedFiles) : $existingImagePaths;
    
        // Bind parameters
        $stmt->bind_param("sssssssi", $title, $description, $time, $date, $location, $imagePaths, $category, $id);
    
        if ($stmt->execute() === FALSE) {
            return "Error: " . $stmt->error;
        } else {
            $stmt->close();
    
            // Redirect after the database operation
            header("location:edit-event?id=$id&s");
    
            // Return success message if needed
            return "Event updated successfully";
        }
    }
    

    // function to delete
    public function delete_event()
    {
        $id = $_POST['id'];

        $sqldeleteGallery = $this->conn->query("delete from events where event_id ='$id'  ");
        header('location:view-all-event?s');
    }

    // function to add news

    public function add_news()
    {
        $title = $this->conn->real_escape_string($_POST['title']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $category = $this->conn->real_escape_string($_POST['category']);
    
        // Use $_FILES instead of $_POST for file uploads
        $images = $_FILES['images'];
    
        $uploadedFiles = [];
    
        foreach ($images['name'] as $key => $name) {
            $randomNumber = rand(1000, 9999);
            $newFileName = $randomNumber . '_' . $name;
            $targetDir = "../assets/img/blog/";
            $targetFile = $targetDir . basename($newFileName);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
            $check = getimagesize($images['tmp_name'][$key]);
            if ($check === false) {
                return "Error: File is not an image.";
            }
    
            if ($images['size'][$key] > 1 * 1024 * 1024) {
                return "Error: File size exceeds 1MB limit.";
            }
    
            $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($imageFileType, $allowedExtensions)) {
                return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            }
    
            if (move_uploaded_file($images['tmp_name'][$key], $targetFile)) {
                $uploadedFiles[] = $targetFile;
            } else {
                return "Error: File upload failed.";
            }
        }
    
        // Files uploaded successfully, now insert blog details into the database using prepared statements
        $imagePaths = implode(",", $uploadedFiles);
    
        $sql = "INSERT INTO blogs (title, description, image_path, category) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bind_param("ssss", $title, $description, $imagePaths, $category);
    
        if ($stmt->execute() === FALSE) {
            return "Error: " . $stmt->error;
        }
    
        $stmt->close();
        header('location:add-blog.php?s');
        return "News added successfully";
    }
    
    // Function to show all News

    public function all_news()
    {
        $data = array();
        $sqlAllNews = $this->conn->query("Select * from blogs  ");
        while ($allNews = mysqli_fetch_assoc($sqlAllNews)) {
            $data[] = $allNews;
        };
        return $data;
    }


    // funtion to home news

    public function home_news()
    {
        $data =[];
        $sqlEvent = $this->conn->query("Select * from blogs order by blog_id desc limit 3");
        while($event = mysqli_fetch_assoc($sqlEvent)){
            $data[] = $event;
        }
        return $data;
    }

    // Recent 5 News
    public function recent_news()
    {
        $data = array();
        $sqlBlog = $this->conn->query("Select * from blogs order by blog_id desc limit 5");
        while ($Blog = mysqli_fetch_assoc($sqlBlog)) {
            $data[] = $Blog;
        };
        return $data;
    }

    // function to add News categories
    public function add_news_cat()
    {
        $cat = $this->conn->real_escape_string($_POST['category']);
        $sql = "INSERT INTO blog_categories (category_name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $cat);

        if ($stmt->execute() === FALSE) {
            return "Error: " . $stmt->error;
        }
        $stmt->close();
        header('location:add-blog.php?c');
        return "Category added successfully";
    }


    // function to show blog category
    public function news_category()
    {
        $data = array();
        $sqlCat = $this->conn->query("Select * from blog_categories");
        while ($Cat = mysqli_fetch_assoc($sqlCat)) {
            $data[] = $Cat;
        };
        return $data;
    }


    // function to edit News

    public function edit_news($id)
    {

        $sqlEditBlog = $this->conn->query("Select * from blogs where blog_id ='$id'  ");
        $editBlog = mysqli_fetch_assoc($sqlEditBlog);
        return $editBlog;
    }

    //update News
    public function update_news()
    {
        $title = $this->conn->real_escape_string($_POST['title']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $category = $this->conn->real_escape_string($_POST['category']);
        $id = $_POST['id'];
    
        // Use $_FILES instead of $_POST for file uploads
        $images = $_FILES['images'];
    
        $uploadedFiles = [];
    
        foreach ($images['name'] as $key => $name) {
            $randomNumber = rand(1000, 9999);
            $newFileName = $randomNumber . '_' . $name;
            $targetDir = "../assets/img/blog/";
            $targetFile = $targetDir . basename($newFileName);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
            $check = getimagesize($images['tmp_name'][$key]);
            if ($check === false) {
                return "Error: File is not an image.";
            }
    
            if ($images['size'][$key] > 1 * 1024 * 1024) {
                return "Error: File size exceeds 1MB limit.";
            }
    
            $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($imageFileType, $allowedExtensions)) {
                return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            }
    
            if (move_uploaded_file($images['tmp_name'][$key], $targetFile)) {
                $uploadedFiles[] = $targetFile;
            } else {
                return "Error: File upload failed.";
            }
        }
    
        // Files uploaded successfully, now update the news details in the database using prepared statements
        $imagePaths = implode(",", $uploadedFiles);
    
        $sql = "UPDATE blogs SET title=?, description=?, image_path=?, category=? WHERE blog_id=?";
        $stmt = $this->conn->prepare($sql);
    
        // Assuming $title, $description, $imagePaths, $category are your updated values
        $stmt->bind_param("ssssi", $title, $description, $imagePaths, $category, $id);
    
        if ($stmt->execute() === FALSE) {
            return "Error: " . $stmt->error;
        }
    
        $stmt->close();
        header("location: edit-blog?id=$id&s");
        return "News updated successfully";
    }
    
    // Query Detailsevent
    public function detailed_blog($id)
    {

        $sqlEvent = $this->conn->query("Select * from blogs where blog_id= '$id'");
        $blog = mysqli_fetch_assoc($sqlEvent);
        return $blog;
    } 

    // function to delete news
    public function delete_news()
    {
        $id = $_POST['id'];

        $sqldeleteGallery = $this->conn->query("delete from blogs where blog_id ='$id'  ");
        header('location:view-all-blog.php?s');
    }
}
