import PublicationList from "@/modules/publications/cars/CarsList.vue";
import CarsEditBasic from "@/modules/publications/cars/edit/CarsEditBasic.vue";

export default [
  {
    path: 'cars',
    name: 'cars-list',
    component: PublicationList
  },
  {
    path: 'cars/create',
    name: 'cars-create',
    component: CarsEditBasic,
  },
  {
    path: 'cars/:id/edit/basic',
    name: 'cars-edit-basic',
    component: CarsEditBasic,
  },
];
