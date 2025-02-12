<?php
require_once __DIR__ . "./../include/head.php";
?>
<section>
    <div class="container mx-auto px-4 py-12">
        <!-- Course Header -->
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg mb-8">
                <div class="p-8">
                    <div class="flex gap-3 mb-4">
                        <?php $tags = $data['cours']->getTags();
                        foreach($tags as $tag)
                        {
                            ?>
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium">
                            <?php echo $tag->getTitre() ?>
                        </span>
                            <?php
                        }
                        ?>
                    </div>
                    <?php if($data['mine']): ?>
                        <div class="flex gap-2">
                            <button
                                onclick="editCourse(<?php echo $data['cours']->getId(); ?>)"
                                class="flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                                <i class="ri-edit-line"></i>
                                Edit
                            </button>
                            <button
                                onclick="confirmDelete(<?php echo $data['cours']->getId(); ?>)"
                                class="flex items-center gap-2 px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                <i class="ri-delete-bin-line"></i>
                                Delete
                            </button>
                        </div>
                    <?php endif; ?>
                    <h1 class="text-3xl font-bold text-gray-800 mb-4"><?php echo $data['cours']->getTitre() ?></h1>
                    <p class="text-gray-600 text-lg mb-6"><?php echo $data['cours']->getDescription() ?>.</p>

                    <!-- Instructor Info -->
                    <div class="flex items-center gap-4 pb-4 border-b">
                        <img src="https://placehold.co/48x48" alt="Instructor" class="w-12 h-12 rounded-full">
                        <div>
                            <p class="font-medium text-gray-800">Dr. <?php echo $data['cours']->getFullName() ?></p>
                            <p class="text-gray-500 text-sm">Senior Web Development Instructor</p>
                        </div>
                    </div>
                </div>

                <?php  $data['cours']->afficherCours() ?>




                <!-- Course Content -->
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Main Content -->
                        <div class="md:col-span-2">
                            <h2 class="text-2xl font-bold mb-6">Course Overview </h2>

                            <div class="prose max-w-none">
                                <p class="text-gray-600 mb-4">In this comprehensive course, you'll learn:</p>
                                <ul class="space-y-2 text-gray-600">
                                    <li>HTML5 semantic elements and modern markup</li>
                                    <li>CSS3 layouts, animations, and responsive design</li>
                                    <li>JavaScript ES6+ and DOM manipulation</li>
                                    <li>Modern framework integration and best practices</li>
                                </ul>
                            </div>

                            <!-- Text Content Example -->
                            <div class="mt-8 p-6 bg-gray-50 rounded-xl">
                                <h3 class="text-xl font-bold mb-4">Introduction to Web Development</h3>
                                <div class="prose max-w-none text-gray-600">
                                    <p>Web development is the process of building and maintaining websites. It encompasses several different aspects, including web design, web publishing, web programming, and database management...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="md:col-span-1">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h3 class="font-bold mb-4">Course Modules</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-lg">
                                        <i class="ri-play-circle-line text-xl text-blue-500"></i>
                                        <span class="flex-1 font-medium">Getting Started</span>
                                        <span class="text-sm text-gray-500">15:00</span>
                                    </div>
                                    <div class="flex items-center gap-3 p-3 hover:bg-gray-100 rounded-lg">
                                        <i class="ri-file-text-line text-xl text-gray-400"></i>
                                        <span class="flex-1">HTML Basics</span>
                                        <span class="text-sm text-gray-500">20:30</span>
                                    </div>
                                    <div class="flex items-center gap-3 p-3 hover:bg-gray-100 rounded-lg">
                                        <i class="ri-file-text-line text-xl text-gray-400"></i>
                                        <span class="flex-1">CSS Fundamentals</span>
                                        <span class="text-sm text-gray-500">25:15</span>
                                    </div>
                                </div>

                                <!-- Course Resources -->
                                <div class="mt-6">
                                    <h3 class="font-bold mb-4">Course Resources</h3>
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-3 p-3 bg-white rounded-lg shadow-sm">
                                            <i class="ri-file-pdf-line text-xl text-red-500"></i>
                                            <span class="flex-1 text-sm">Course Syllabus</span>
                                            <i class="ri-download-line text-gray-400"></i>
                                        </div>
                                        <div class="flex items-center gap-3 p-3 bg-white rounded-lg shadow-sm">
                                            <i class="ri-file-zip-line text-xl text-orange-500"></i>
                                            <span class="flex-1 text-sm">Project Files</span>
                                            <i class="ri-download-line text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($data['mine']) {?>
    <div class="p-8 border-t">
        <h2 class="text-2xl font-bold mb-6">Enrolled Students</h2>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Table Header -->
            <div class="grid grid-cols-3 gap-4 p-4 bg-gray-50 border-b text-sm font-medium text-gray-600">
                <div>Student Name</div>
                <div>Email</div>
                <div>Inscription Date</div>
            </div>

            <!-- Table Body -->
            <div class="divide-y">
                <?php foreach($data['etudiant'] as $etudiant): ?>
                    <div class="grid grid-cols-3 gap-4 p-4 items-center hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-medium">
                            <?php echo substr($etudiant['fullname'], 0, 1); ?>
                        </span>
                            </div>
                            <span class="font-medium text-gray-800"><?php echo $etudiant['fullname']; ?></span>
                        </div>
                        <div class="text-gray-600"><?php echo $etudiant['email']; ?></div>
                        <div class="text-gray-600">
                            <?php echo date('d M Y', strtotime($etudiant['date_inscription'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php } ?>
<div id="editCourseModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-[80%] p-6 overflow-y-auto h-[80%]">
        <h2 class="text-lg font-semibold text-gray-800">Edit Course</h2>
        <form id="editCourseForm" class="mt-4 space-y-4" enctype="multipart/form-data">
            <input type="hidden" id="courseId" name="courseId">

            <div>
                <label for="editCourseTitle" class="block text-sm font-medium text-gray-700">Title</label>
                <input
                    type="text"
                    id="editCourseTitle"
                    name="title"
                    class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="editCourseDescription" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="editCourseDescription"
                    name="description"
                    class="block w-full mt-1 border px-3 py-2 h-32 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </textarea>
            </div>

            <div>
                <label for="editCourseImage" class="block text-sm font-medium text-gray-700">Image</label>
                <input
                    type="file"
                    id="editCourseImage"
                    name="image"
                    accept="image/*"
                    class="block w-full mt-1 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="editCourseTags" class="block text-sm font-medium text-gray-700">Tags</label>
                <input
                    type="text"
                    id="editCourseTags"
                    name="tags"
                    class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Type and press Enter to add tags">
                <div id="editTagsList" class="hidden bg-white border mt-1 rounded-md shadow-md overflow-y-auto max-h-32 w-full"></div>
                <div id="editSelectedTags" class="mt-2 flex flex-wrap gap-2"></div>
                <input type="hidden" name="[]" id="editTags">
            </div>

            <div>
                <label for="editCourseCategorie" class="block text-sm font-medium text-gray-700">Category</label>
                <select
                    id="editCourseCategorie"
                    name="categorie"
                    class="block px-3 py-2 w-full mt-1 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php
                    foreach($data['categorie'] as $categorie)
                    {
                        echo "<option value ='".$categorie->getId()."'>".$categorie->getTitre()."</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="editCourseType" class="block text-sm font-medium text-gray-700">Type</label>
                <select
                    id="editCourseType"
                    name="type"
                    class="block px-3 py-2 w-full mt-1 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    onchange="toggleContentField()">
                    <option value="texte">Text</option>
                    <option value="video">Video</option>
                </select>
            </div>

            <div id="editTextContentField" class="hidden">
                <label for="editCourseText" class="block text-sm font-medium text-gray-700">Text Content</label>
                <textarea
                    id="editCourseText"
                    name="content"
                    class="block w-full mt-1 border px-3 py-2 h-32 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </textarea>
            </div>

            <div id="editVideoContentField" class="hidden">
                <label for="editCourseVideo" class="block text-sm font-medium text-gray-700">Video File</label>
                <input
                    type="file"
                    id="editCourseVideo"
                    name="video"
                    accept="video/*"
                    class="block w-full mt-1 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="flex justify-end space-x-4">
                <button
                    type="button"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg shadow-md hover:bg-gray-400 transition"
                    onclick="toggleModal(false)">
                    Cancel
                </button>
                <button
                    id="updateCourse"
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
<script >
    // Function to edit course details
    // Function to edit course details
    const courseTagsInput = document.getElementById('editCourseTags');
    const tagsList = document.getElementById('editTagsList');
    const selectedTagsContainer = document.getElementById('editSelectedTags');
    let selectedTags = [];
    function editCourse(courseId) {
        fetch(`/youdemy-mvc/cours/afficher/${courseId}`)
            .then(response => response.json())
            .then(course => {
                console.log(course);
                document.getElementById('courseId').value = courseId;
                document.getElementById('editCourseTitle').value = course.titre;
                document.getElementById('editCourseDescription').value = course.description;
                document.getElementById('editCourseCategorie').value = course.categorie_id;
                document.getElementById('editCourseType').value = course.contenu_type;

                // Toggle content fields based on type
                toggleContentField(course.contenu_type);

                if (course.contenu_type === 'texte') {
                    console.log("conn",course.contenu)
                    document.getElementById('editCourseText').value = course.contenu;
                }

                toggleModal(true);
            })
            .catch(err => console.error('Error fetching course details:', err));

        fetch(`/youdemy-mvc/tag/afficher/${courseId}`)
            .then(response => response.json())
            .then(tags => {
                console.log(tags)
                selectedTags = tags;
                updateSelectedTags(tags);
            })
            .catch(err => console.error('Error fetching course tags:', err));
    }

    // Fetch tags for suggestions
    function fetchTags(query) {
        fetch(`/Youdemy-mvc/Tag/getalljson/${query}`)
            .then(response => response.json())
            .then(tags => {
                tagsList.innerHTML = '';
                tags.forEach(tag => {
                    const tagItem = document.createElement('div');
                    tagItem.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-100');
                    tagItem.textContent = tag.titre;
                    tagItem.setAttribute('data-id', tag.id);
                    tagItem.setAttribute('data-name', tag.titre);
                    tagsList.appendChild(tagItem);
                    tagItem.addEventListener('click', function () {
                        addTag(tag);
                    });
                });
                tagsList.classList.remove('hidden');
            });
    }

    function addTag(tag) {
        if (!selectedTags.some(t => t.id === tag.id || t.titre.toLowerCase() === tag.titre.toLowerCase())) {
            selectedTags.push(tag);
            updateSelectedTags();
            console.log("new",selectedTags)
        }
        document.getElementById('editCourseTags').value = '';
        tagsList.classList.add('hidden');
    }

    function removeTag(tag) {
        selectedTags = selectedTags.filter(t => t.id !== tag.id);
        updateSelectedTags();
    }

    function updateSelectedTags() {

        selectedTagsContainer.innerHTML = '';
        const tagsInput = document.getElementById('editTags');
        tagsInput.value = JSON.stringify(selectedTags.map(tag => tag.id));

        selectedTags.forEach(tag => {
            const tagElement = document.createElement('div');
            tagElement.classList.add('bg-blue-500', 'text-white', 'px-4', 'py-1', 'rounded-full', 'flex', 'items-center', 'gap-2');
            tagElement.textContent = tag.titre;

            const removeIcon = document.createElement('span');
            removeIcon.textContent = '×';
            removeIcon.classList.add('cursor-pointer');
            removeIcon.addEventListener('click', () => removeTag(tag));

            tagElement.appendChild(removeIcon);
            selectedTagsContainer.appendChild(tagElement);
        });
    }

    function toggleModal(show) {
        const modal = document.getElementById('editCourseModal');
        modal.classList.toggle('hidden', !show);

        if (!show) {
            document.getElementById('editCourseForm').reset();
            selectedTags = [];
            updateSelectedTags();
            toggleContentField();
        }
    }

    function toggleContentField(type = '') {
        const textField = document.getElementById('editTextContentField');
        const videoField = document.getElementById('editVideoContentField');

        if (type === 'texte') {
            textField.classList.remove('hidden');
            videoField.classList.add('hidden');
        } else if (type === 'video') {
            videoField.classList.remove('hidden');
            textField.classList.add('hidden');
        } else {
            textField.classList.add('hidden');
            videoField.classList.add('hidden');
        }
    }

    document.getElementById('editCourseTags').addEventListener('input', function () {
        const query = this.value.trim();
        if (query.length >= 1) {
            fetchTags(query);
        } else {
            tagsList.classList.add('hidden');
        }
    });

    courseTagsInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && courseTagsInput.value.trim() !== '') {
            e.preventDefault();
            const newTag = { id: 'new' + selectedTags.length, titre: courseTagsInput.value.trim() };
            addTag(newTag);
        }
    });

    document.getElementById('editCourseType').addEventListener('change', (e) => {
        toggleContentField(e.target.value);
    });



    function confirmDelete(courseId) {
        Swal.fire({
            title: 'Delete Course?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `/youdemy-mvc/cours/supprimer/${courseId}`;
            }
        });
    }
    document.getElementById('editCourseForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        formData.append('selectedTags', JSON.stringify(selectedTags));
        fetch('/youdemy-mvc/cours/modifier', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                window.location.href =`/youdemy-mvc/home/viewcours/${data['coursId']}`

            })
            .catch(error => {
                console.error('Error occurred:', error);
                alert(`An unexpected error occurred: ${error.message}`);
            });

    });
</script>
<?php
require_once __DIR__ . "./../include/footer.php";
?>
</body>
</html>
