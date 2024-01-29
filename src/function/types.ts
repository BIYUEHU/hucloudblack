export interface ValType {
  status: boolean;
  uuid: string;
  plate: string;
  identity: string;
  descr: string;
  level: 1 | 2 | 3;
  phone?: number;
  imgs: string[];
  date: string;
}
