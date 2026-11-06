export class StudentModal {
    constructor({ root, form, title, error }) {
        this.root = root;
        this.form = form;
        this.title = title;
        this.error = error;
        this.fields = {
            id: form.querySelector('#student-id'),
            nama: form.querySelector('#field-nama'),
            desa: form.querySelector('#field-desa'),
            umur: form.querySelector('#field-umur'),
            jenis_kelamin: form.querySelector('#field-gender'),
            elemen: form.querySelector('#field-elemen'),
        };

        root.addEventListener('click', (event) => {
            if (event.target.closest('[data-close]')) {
                this.close();
            }
        });
    }

    open(student = null) {
        this.error.hidden = true;
        this.form.reset();

        this.title.textContent = student ? 'Edit Student' : 'Tambah Student';
        this.fields.id.value = student?.id ?? '';

        if (student) {
            this.fields.nama.value = student.nama;
            this.fields.desa.value = student.desa;
            this.fields.umur.value = student.umur;
            this.fields.jenis_kelamin.value = student.jenis_kelamin;
            this.fields.elemen.value = student.elemen;
        }

        this.root.hidden = false;
        this.fields.nama.focus();
    }

    close() {
        this.root.hidden = true;
    }

    values() {
        return {
            id: Number(this.fields.id.value) || 0,
            nama: this.fields.nama.value.trim(),
            desa: this.fields.desa.value.trim(),
            umur: Number(this.fields.umur.value),
            jenis_kelamin: this.fields.jenis_kelamin.value,
            elemen: this.fields.elemen.value.trim(),
        };
    }

    showErrors(errors) {
        const messages = Object.values(errors);
        this.error.textContent = messages.length ? messages.join(' ') : 'Gagal menyimpan data.';
        this.error.hidden = false;
    }
}
