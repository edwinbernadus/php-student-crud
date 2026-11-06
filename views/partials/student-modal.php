<?php /** @var string[] $genders */ ?>
<div class="modal" id="student-modal" hidden>
    <div class="modal-backdrop" data-close></div>

    <form class="modal-card" id="student-form" novalidate>
        <h2 class="modal-title" id="modal-title">Tambah Student</h2>
        <div class="alert" id="form-error" hidden></div>

        <input type="hidden" id="student-id" value="">

        <label class="field">Nama
            <input class="input" id="field-nama" type="text" required>
        </label>

        <label class="field">Desa Kelahiran
            <input class="input" id="field-desa" type="text" list="desa-options" required>
        </label>

        <div class="grid-2">
            <label class="field">Umur
                <input class="input" id="field-umur" type="number" min="0" max="200" required>
            </label>

            <label class="field">Jenis Kelamin
                <select class="input" id="field-gender" required>
                    <?php foreach ($genders as $gender): ?>
                        <option value="<?= e($gender) ?>"><?= e($gender) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>

        <label class="field">Elemen
            <input class="input" id="field-elemen" type="text" list="elemen-options" required>
        </label>

        <div class="modal-actions">
            <button class="btn text" type="button" data-close>Batal</button>
            <button class="btn primary" type="submit">Simpan</button>
        </div>
    </form>
</div>

<datalist id="desa-options"></datalist>
<datalist id="elemen-options"></datalist>
