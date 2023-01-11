<template>
    <breeze-authenticated-layout>
        <template #header>
            <Heading>
                Add New Department
            </Heading>
        </template>

        <div v-show="form.hasErrors">
            <div class="text-red-600 font-medium">Please make the following corrections</div>
        </div>

        <form @submit.prevent="submit">
            <!-- NAME -->
            <div>
                <Label for="name" value="Name"></Label>
                <Input type="text" id="name" class="mt-1 block w-1/2" v-model="form.name" required autofocus
                    :error="form.errors.name"></Input>
                <InputError :message="form.errors.name"></InputError>
            </div>
            <!-- PHONE -->
            <div class="mt-4">
                <Label for="email" value="Email"></Label>
                <Input type="email" id="email" class="mt-1 block w-1/2" v-model="form.email"
                    :error="form.errors.email"></Input>
                <InputError :message="form.errors.email"></InputError>
            </div>
            <!-- EMAIL -->
            <div class="mt-4">
                <Label for="phone" value="Phone"></Label>
                <Input type="text" id="phone" class="mt-1 block w-1/2" v-model="form.phone"
                    :error="form.errors.phone"></Input>
                <InputError :message="form.errors.phone"></InputError>
            </div>

            <!-- submit -->
            <div class="flex items-center justify-end mt-4">
                <ResetButton @click="resetForm">Clear Form</ResetButton>
                <Button :loading="form.processing">Create</Button>
            </div>
        </form>

    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
import AnchorLink from '@/Components/AnchorLink'
import Label from '@/Components/Label'
import Input from '@/Components/Input'
import InputError from '@/Components/InputError'
import Button from '@/Components/Button'
import ResetButton from '@/Components/ResetButton'
import Heading from '@/Components/Heading'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    components: {
        BreezeAuthenticatedLayout,
        AnchorLink,
        Label,
        Input,
        InputError,
        Button,
        ResetButton,
        Heading
    },
    setup() {
        const form = useForm({
            name: null,
            email: null,
            phone: null,
        })

        return { form }
    },
    methods: {
        submit() {
            this.form.post(route('departments.store'), {
                // Preserve the scroll only if the form has errors.
                preserveScroll: (page) => Object.keys(page.props.errors).length
            });
        },
        resetForm() {
            this.form.clearErrors();
            this.form.reset();
        }
    }
}
</script>
