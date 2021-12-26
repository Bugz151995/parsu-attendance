<!-- Modal -->
<div class="modal fade" id="editCourseModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCourseModalLabel"><i class="bx bx-edit"></i> Edit Courses</h5>
        <button type="button" class="btn-close" onclick="clearData()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/courses/update') ?>
      <div class="modal-body">
      <input type="hidden" name="course_id" id="cid_edit">
        <div class="mb-3">
          <div class="form-floating">
            <input type="text" id="course_edit" name="course" class="form-control" placeholder="Course" required>
            <label for="course_edit">Course Code <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <textarea id="description_edit" style="height: 100px" name="description" class="form-control" placeholder="Description" required></textarea>
            <label for="description_edit">Description <span class="text-danger">*</span></label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="clearData()" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    var editCourseModal = document.getElementById('editCourseModal')
    let cidTag = document.getElementById('cid_edit');
    let courseTag = document.getElementById('course_edit');
    let descriptionTag = document.getElementById('description_edit');

    editCourseModal.addEventListener('hidden.bs.modal', function(event) {      
      cidTag.setAttribute('value', '');
      courseTag.setAttribute('value', '');
      descriptionTag.setAttribute('value', '');
    });

    editCourseModal.addEventListener('shown.bs.modal', function(event) {
      let course = JSON.parse(sessionStorage.getItem('course'));
      cidTag.setAttribute('value', course.course_id);
      courseTag.setAttribute('value', course.course);
      descriptionTag.innerHTML = course.description;
    });
  });
</script>