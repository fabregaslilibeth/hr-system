<template>
    <div>
        <div class="form-group row">
            <label for="question" class="col-sm-2 col-form-label">Question</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       id="question"
                       v-model="question">
            </div>
        </div>
        <div class="form-group row">
            <label for="choices" class="col-sm-2 col-form-label">Choices</label>
            <div class="col-10">
                <div class="d-flex my-1" v-for="(choice, index) in choices" :key="index">
                    <input
                        type="text"
                        class="form-control"
                        id="choices"
                        v-model="choices[index]"
                        :placeholder="`${index + 1}`">
                    <button class="btn btn-outline-secondary align-items-start" v-if="index > 1"
                            @click="deleteRow(index)">Delete
                    </button>
                </div>
            </div>

        </div>
        <div class="row form-group">
            <button class="btn btn-outline-secondary" v-if="choices.length < choicesLimit" @click="addRow">Add choice
            </button>
        </div>

        <div class="form-group row">
            <label for="answer" class="col-sm-2 col-form-label">Answer</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       id="answer"
                       placeholder="1, 2, 3, or 4"
                       v-model="answer"
                       @input="handleAnswer">
            </div>
            <p class="text-right"><small class="text-danger" v-if="errorMessage">{{ errorMessage }}</small></p>
        </div>

        <div class="form-group row">
            <label for="departments" class="col-sm-2 col-form-label">Departments</label>
            <div class="col-10">
                <div class="d-flex my-1" v-for="(department, index) in departments" :key="index">
                    <input
                        type="text"
                        class="form-control"
                        id="departments"
                        v-model="departments[index]"
                        :placeholder="`Department ${index + 1}`">
                    <button class="btn btn-outline-secondary align-items-start" v-if="index > 0"
                            @click="deleteDepartment(index)">Delete
                    </button>
                </div>
            </div>

        </div>
        <div class="row form-group">
            <button class="btn btn-outline-secondary" @click="addDepartment">Add Department</button>
        </div>

        <button type="submit" class="btn btn-primary" @click="submit">Submit</button>

    </div>
</template>

<script>
export default {
    name: 'Add Question',
    data() {
        return {
            question: '',
            choicesLimit: 4,
            choices: [''],
            answer: '',
            departments: [''],
            errorMessage: ''
        }
    },
    methods: {
        addRow() {
            if (this.choices.length < this.choicesLimit) {
                this.choices.push('')
            }
        },
        deleteRow(index) {
            this.choices.splice(index, 1)
        },
        addDepartment() {
            this.departments.push('')
        },
        deleteDepartment(index) {
            this.departments.splice(index, 1)
        },
        handleAnswer () {
          this.errorMessage = ''
        },
        submit() {
            //check if answer is in choices
            if (this.choices.includes(this.answer.toLowerCase())) {
                axios.post('/questions', {
                    'question': this.question,
                    'choices': this.choices,
                    'answer': this.answer,
                    'departments': this.departments
                }).then(() => {
                    window.location = '/questions'
                })
            } else {
                this.errorMessage = 'Please make sure answer is in choices.'
            }
        }
    }
}
</script>
