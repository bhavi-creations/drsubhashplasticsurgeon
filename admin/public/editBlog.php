<?php
// Database connection (replace with your actual database connection details)
include '../../db.connection/db_connection.php';

// Get blog ID from URL
$blog_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($blog_id > 0) {
    // Fetch blog data
    $stmt = $conn->prepare("SELECT title, main_content, full_content, service FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $blog_id);
    $stmt->execute();
    $stmt->bind_result($title, $main_content, $full_content, $service);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Invalid blog ID.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Devarsh Hospitals - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Include Quill CSS -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include 'navbar.php'; ?>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit BLOG</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-11">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">EDIT CONTENT</h6>
                                </div>
                                <div class="card-body">
                                    <form style='color:black;' id="editblogform" action="addBlog.php" method="POST" enctype="multipart/form-data">
                                        <!-- Title Input -->
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">ENTER TITLE</label>
                                            <input type="text" class="form-control text-grey-900" name='title' id="exampleFormControlInput1" value="<?php echo htmlspecialchars($title); ?>" placeholder="Title" required>
                                        </div>

                                        <!-- Service Input -->
                                        <!-- Service Dropdown -->
                                        <div class="filter-section mb-3">
                                            <label for="service" class="form-label text-primary">Select Service:</label>
                                            <select id="service" name="service" class="form-control" required>
                                                <option value="">Select a Service</option>
                                                <option value="Abdominoplasty (Tummy tuck)" <?php echo ($service == 'Abdominoplasty (Tummy tuck)') ? 'selected' : ''; ?>>Abdominoplasty (Tummy tuck)</option>
                                                <option value="Axillary Fat Removal" <?php echo ($service == 'Axillary Fat Removal') ? 'selected' : ''; ?>>Axillary Fat Removal</option>
                                                <option value="Breast Augmentation" <?php echo ($service == 'Breast Augmentation') ? 'selected' : ''; ?>>Breast Augmentation</option>
                                                <option value="Breast Reduction" <?php echo ($service == 'Breast Reduction') ? 'selected' : ''; ?>>Breast Reduction</option>
                                                <option value="Breast Lift" <?php echo ($service == 'Breast Lift') ? 'selected' : ''; ?>>Breast Lift</option>
                                                <option value="Buttock Augmentation" <?php echo ($service == 'Buttock Augmentation') ? 'selected' : ''; ?>>Buttock Augmentation</option>
                                                <option value="Chin Implant" <?php echo ($service == 'Chin Implant') ? 'selected' : ''; ?>>Chin Implant</option>
                                                <option value="Calf Implant" <?php echo ($service == 'Calf Implant') ? 'selected' : ''; ?>>Calf Implant</option>
                                                <option value="Eyelid Corrections" <?php echo ($service == 'Eyelid Corrections') ? 'selected' : ''; ?>>Eyelid Corrections</option>
                                                <option value="Ear lobule Repairs" <?php echo ($service == 'Ear lobule Repairs') ? 'selected' : ''; ?>>Ear lobule Repairs</option>
                                                <option value="Ear Piercing" <?php echo ($service == 'Ear Piercing') ? 'selected' : ''; ?>>Ear Piercing</option>
                                                <option value="Face Lift" <?php echo ($service == 'Face Lift') ? 'selected' : ''; ?>>Face Lift</option>
                                                <option value="Filler Injections<" <?php echo ($service == 'Filler Injections<') ? 'selected' : ''; ?>>Filler Injections<</option>
                                                <option value="Gynaecomastia (Male breast)" <?php echo ($service == 'Gynaecomastia (Male breast)') ? 'selected' : ''; ?>>Gynaecomastia (Male breast)</option>
                                                <option value="Gender Confirmation Surgery" <?php echo ($service == 'Gender Confirmation Surgery') ? 'selected' : ''; ?>>Gender Confirmation Surgery</option>
                                                <option value="Hair Fall (PRP)" <?php echo ($service == 'Hair Fall (PRP)') ? 'selected' : ''; ?>>Hair Fall (PRP)</option>
                                                <option value="Keloids & Hypertrophic Scars" <?php echo ($service == 'Keloids & Hypertrophic Scars') ? 'selected' : ''; ?>>Keloids & Hypertrophic Scars</option>
                                                <option value="Laser Hair Reduction" <?php echo ($service == 'Laser Hair Reduction') ? 'selected' : ''; ?>>Laser Hair Reduction</option>
                                                <option value="Laser Scan Treatment" <?php echo ($service == 'Laser Scan Treatment') ? 'selected' : ''; ?>>Laser Scan Treatment</option>
                                                <option value="Laser Vaginoplasty" <?php echo ($service == 'Laser Vaginoplasty') ? 'selected' : ''; ?>>Laser Vaginoplasty</option>
                                                <option value="Obesity (Liposuction)	" <?php echo ($service == 'Obesity (Liposuction)	') ? 'selected' : ''; ?>>Obesity (Liposuction)	</option>
                                                <option value="Lip Corrections" <?php echo ($service == 'Lip Corrections') ? 'selected' : ''; ?>>Lip Corrections</option>
                                                <option value="Liposuction" <?php echo ($service == 'Liposuction') ? 'selected' : ''; ?>>Liposuction</option>
                                                <option value="Nose Job (Rhinoplasty)" <?php echo ($service == 'Nose Job (Rhinoplasty)') ? 'selected' : ''; ?>>Nose Job (Rhinoplasty)</option>
                                                <option value="Post Bariatric Body Contouring" <?php echo ($service == 'Post Bariatric Body Contouring') ? 'selected' : ''; ?>>Post Bariatric Body Contouring</option>
                                                <option value="Scar Revisions" <?php echo ($service == 'Scar Revisions') ? 'selected' : ''; ?>>Scar Revisions</option>
                                                <option value="Stretch Marks" <?php echo ($service == 'Stretch Marks') ? 'selected' : ''; ?>>Stretch Marks</option>
                                                <option value="Tattoo Removal" <?php echo ($service == 'Tattoo Removal') ? 'selected' : ''; ?>>Tattoo Removal</option>
                                                <option value=" Tissue Expanders	" <?php echo ($service == 'Tissue Expanders	') ? 'selected' : ''; ?>>Tissue Expanders	</option>
                                                <option value="Wrinkles (Botox injections)" <?php echo ($service == 'Wrinkles (Botox injections)') ? 'selected' : ''; ?>>Wrinkles (Botox injections)</option>
                                                
                                            
                                            
                                            
                                            </select>
                                        </div>


                                        <div class="filter-section mb-3">
                                            <label for="service" class="form-label text-primary">Select Service:</label>
                                            <select id="service" name="service" class="form-control" required>
                                            <option value="">Select a Service</option>
                                            <option value="AV Fistula<" <?php echo ($service == 'AV Fistula<') ? 'selected' : ''; ?>>AV Fistula<</option> 
                                            <option value="Burns and Post- Burn Sequelae" <?php echo ($service == 'Burns and Post- Burn Sequelae') ? 'selected' : ''; ?>>Burns and Post- Burn Sequelae</option>   
                                            <option value="Crush Injuries" <?php echo ($service == 'Crush Injuries') ? 'selected' : ''; ?>>Crush Injuries</option>   
                                            <option value="Chronic Non-healing Ulcers" <?php echo ($service == 'Chronic Non-healing Ulcers') ? 'selected' : ''; ?>>Chronic Non-healing Ulcers</option>   
                                            <option value=""Contractures <?php echo ($service == 'Contractures') ? 'selected' : ''; ?>>Contractures</option>   
                                            <option value="Cleft Lip/Palate" <?php echo ($service == 'Cleft Lip/Palate') ? 'selected' : ''; ?>>Cleft Lip/Palate</option>   
                                            <option value="Congenital Ear Deformities" <?php echo ($service == 'Congenital Ear Deformities') ? 'selected' : ''; ?>>Congenital Ear Deformities</option>   
                                            <option value="Faciomaxillary Trauma" <?php echo ($service == 'Faciomaxillary Trauma') ? 'selected' : ''; ?>>Faciomaxillary Trauma</option>   
                                            <option value="Free Flaps ( Microvascular Surgery)" <?php echo ($service == 'Free Flaps ( Microvascular Surgery)') ? 'selected' : ''; ?>>Free Flaps ( Microvascular Surgery)</option>   
                                            <option value="Hand and Foot Deformities" <?php echo ($service == 'Hand and Foot Deformities') ? 'selected' : ''; ?>>Hand and Foot Deformities</option>   
                                            <option value="Lymphoedema" <?php echo ($service == 'Lymphoedema') ? 'selected' : ''; ?>>Lymphoedema</option>   
                                            <option value="Post Traumatic/ Malignant Defects" <?php echo ($service == 'Post Traumatic/ Malignant Defects') ? 'selected' : ''; ?>>Post Traumatic/ Malignant Defects</option>   
                                            <option value="Replantations" <?php echo ($service == 'Replantations') ? 'selected' : ''; ?>>Replantations</option>   
                                            <option value="Skin & Soft tissue (Sarcoma) Malignancies" <?php echo ($service == 'Skin & Soft tissue (Sarcoma) Malignancies') ? 'selected' : ''; ?>>Skin & Soft tissue (Sarcoma) Malignancies</option>   
                                            <option value="Tendon and Nerve Injuries" <?php echo ($service == 'Tendon and Nerve Injuries') ? 'selected' : ''; ?>>Tendon and Nerve Injuries</option>   
                                            <option value="Vascular Anomalies" <?php echo ($service == 'Vascular Anomalies') ? 'selected' : ''; ?>>Vascular Anomalies</option>   
                                            <option value="Vaginoplasty" <?php echo ($service == 'Vaginoplasty') ? 'selected' : ''; ?>>Vaginoplasty</option>   
                                            <option value="Varicose Veins" <?php echo ($service == 'Varicose Veins') ? 'selected' : ''; ?>>Varicose Veins</option>   

                                              
                                            </select></div>


                                        <!-- Quill Editor for Main Content -->
                                        <div class="mb-3">
                                            <label for="mainEditor" class="form-label text-primary">ENTER MAIN CONTENT</label>
                                            <div id="mainEditor" style="height: 200px;"></div>
                                            <input name="main_content" id="mainContentData" style="display: none">
                                        </div>

                                        <!-- Main Image Upload -->
                                        <div class="mb-3">
                                            <label for="formFileMainImage" class="form-label text-primary my-2">Choose Main Image</label>
                                            <input class="form-control" name="main_image" type="file" id="formFileMainImage" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formFileVideo" class="form-label text-primary">Choose Video</label>
                                            <input class="form-control" name="video" type="file" id="formFileVideo" required>
                                        </div>

                                        <!-- Quill Editor for Full Content -->
                                        <label for="editor" class="form-label text-primary">ENTER FULL CONTENT</label>
                                        <div id="editor" style='height:400px;'></div>
                                        <input name="full_content" id="formcontentdata" style="display: none">

                                        <!-- Hidden Input for Blog ID -->
                                        <input type="hidden" name="id" value="<?php echo $blog_id; ?>">

                                        <!-- Form Buttons -->
                                        <div class='row p-3'>
                                            <div class='col-xl-7 col-sm-2'></div>
                                            <button type='reset' class='btn btn-danger mx-1 my-2 col-xl-2'>Clear</button>
                                            <button type='submit' class='btn btn-success mx-1 my-2 col-xl-2'>Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <!-- End of Footer -->
        </div>
    </div>

    <!-- Include Quill JS -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <!-- Initialize Quill Editors and Load Existing Data -->
    <script>
        // Initialize Quill editors with color options in the toolbar
        const quillMain = new Quill('#mainEditor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': '1'
                    }, {
                        'header': '2'
                    }, {
                        'font': []
                    }],
                    [{
                        'size': []
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // Color and background color options
                    ['link', 'blockquote'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'align': []
                    }],
                    ['clean'] // Remove formatting button
                ]
            },
            placeholder: 'Enter main content...',
        });

        const quillFull = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': '1'
                    }, {
                        'header': '2'
                    }, {
                        'font': []
                    }],
                    [{
                        'size': []
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // Color and background color options
                    ['link', 'blockquote'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'align': []
                    }],
                    ['clean'] // Remove formatting button
                ]
            },
            placeholder: 'Compose full content...',
        });

        // Load existing data into Quill editors
        quillMain.root.innerHTML = <?php echo json_encode($main_content); ?>;
        quillFull.root.innerHTML = <?php echo json_encode($full_content); ?>;

        // On form submission, set Quill content into hidden input fields
        document.querySelector('#editblogform').onsubmit = function() {
            document.querySelector('#mainContentData').value = quillMain.root.innerHTML;
            document.querySelector('#formcontentdata').value = quillFull.root.innerHTML;
        };
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>