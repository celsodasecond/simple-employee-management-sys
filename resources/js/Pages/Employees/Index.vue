<template>
    <breeze-authenticated-layout>
        <template #header>
            <Heading>
                Employees
            </Heading>
        </template>


        <div class="flex items-center justify-between mb-6">
            <Select id="department_id" class="mt-1 block w-1/3" v-model="department_id" :options="departments"
                @change="getEmployees(department_id)"></Select>
            <AnchorLink :href="route('employees.create')">Add New Employee</AnchorLink>
        </div>
        <Table>
            <template #header>
                <TableData>Id</TableData>
                <TableData>Name</TableData>
                <TableData>Department</TableData>
                <TableData>Email</TableData>
                <TableData>Actions</TableData>
            </template>
            <tr v-for="employee in employees" :key="employee.id" class="hover:bg-gray-200">
                <TableData>{{ employee.id }}</TableData>
                <TableData>{{ employee.name }}</TableData>
                <TableData>{{ employee.department }}</TableData>
                <TableData>{{ employee.email }}</TableData>
                <TableData>
                    <AnchorLink mode="edit" :href="route('employees.edit', employee.id)">Edit</AnchorLink>
                    <AnchorLink mode="delete" @click="destroy(employee.id)">Delete</AnchorLink>
                </TableData>
            </tr>
        </Table>

    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
import TableData from '@/Components/TableData'
import Table from '@/Components/Table'
import AnchorLink from '@/Components/AnchorLink'
import Select from '@/Components/Select'
import Heading from '@/Components/Heading'

export default {

    components: {
        BreezeAuthenticatedLayout,
        TableData,
        Table,
        AnchorLink,
        Select,
        Heading
    },
    props: {
        employees: Object,
        departments: Object,
        department_id: [String, Number]
    },
    methods: {
        destroy(id) {
            if (confirm("Do you really want to delete this department?")) {
                this.$inertia.delete(route('employees.destroy', id));
            }
        },
        // To render only the employees and department id and not the whole department.
        getEmployees(department_id) {
            this.$inertia.get(route('employees.index'), { department_id: department_id }, { only: ['employees', 'department_id'] })
        }
    }
}
</script>
