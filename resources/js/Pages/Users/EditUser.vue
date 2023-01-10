<template>
    <breeze-authenticated-layout>
        <template #header>
            <Heading>Edit User - {{ form.name }}</Heading>
        </template>

        <div v-show="form.hasErrors">
            <div class="text-red-600 font-medium">
                Please make the following corrections:
            </div>
        </div>

        <div v-show="form.wasSuccessful">
            <div class="text-green-600 font-medium">
                Profile Updated.
            </div>
        </div>

        <form @submit.prevent="submit">
            <div>
                <Label for="name" value="Name"></Label>
                <Input type="text" id="name" class="mt-1 block w-1/2" v-model="form.name" required autofocus
                    :error="form.errors.name"></Input>
                <InputError :message="form.errors.name"></InputError>
            </div>
            <div class="mt-4">
                <Label for="email" value="Email"></Label>
                <Input type="email" id="email" class="mt-1 block w-1/2" v-model="form.email"
                    :error="form.errors.email"></Input>
                <InputError :message="form.errors.email"></InputError>
            </div>

            <!-- submit -->
            <div class="flex items-center justify-end mt-4">
                <ResetButton @click="resetForm">Reset</ResetButton>
                <Button :loading="form.processing">Update</Button>
            </div>
        </form>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import AnchorLink from "@/Components/AnchorLink";
import Label from "@/Components/Label";
import Input from "@/Components/Input";
import InputError from "@/Components/InputError";
import Button from "@/Components/Button";
import ResetButton from "@/Components/ResetButton";
import Heading from "@/Components/Heading";
import Select from "@/Components/Select";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        AnchorLink,
        Label,
        Input,
        Button,
        ResetButton,
        InputError,
        Heading,
        Select,
    },
    setup(props) {
        const form = useForm({
            name: props.user.name,
            email: props.user.email,
        });

        return { form };
    },
    props: {
        user: Object,
    },
    methods: {
        submit() {
            this.form.put(route("update-profile", this.user.id));
        },
        resetForm() {
            this.form.clearErrors();
            this.form.reset();
        },
    },
};
</script>
