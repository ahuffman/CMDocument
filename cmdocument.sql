
CREATE SEQUENCE public.cmd_disk_raid_type_disk_raid_type_id_seq;

CREATE TABLE public.cmd_disk_raid_type (
                disk_raid_type_id INTEGER NOT NULL DEFAULT nextval('public.cmd_disk_raid_type_disk_raid_type_id_seq'),
                disk_raid_type VARCHAR NOT NULL,
                CONSTRAINT disk_raid_type_id PRIMARY KEY (disk_raid_type_id)
);


ALTER SEQUENCE public.cmd_disk_raid_type_disk_raid_type_id_seq OWNED BY public.cmd_disk_raid_type.disk_raid_type_id;

CREATE SEQUENCE public.cmd_priority_priority_id_seq;

CREATE TABLE public.cmd_priority (
                priority_id INTEGER NOT NULL DEFAULT nextval('public.cmd_priority_priority_id_seq'),
                priority VARCHAR NOT NULL,
                CONSTRAINT priority_id PRIMARY KEY (priority_id)
);


ALTER SEQUENCE public.cmd_priority_priority_id_seq OWNED BY public.cmd_priority.priority_id;

CREATE SEQUENCE public.cmd_purpose_purpose_id_seq;

CREATE TABLE public.cmd_purpose (
                purpose_id INTEGER NOT NULL DEFAULT nextval('public.cmd_purpose_purpose_id_seq'),
                purpose VARCHAR NOT NULL,
                CONSTRAINT purpose_id PRIMARY KEY (purpose_id)
);


ALTER SEQUENCE public.cmd_purpose_purpose_id_seq OWNED BY public.cmd_purpose.purpose_id;

CREATE TABLE public.cmd_owner (
                owner_id INTEGER NOT NULL,
                owner VARCHAR NOT NULL,
                CONSTRAINT owner_id PRIMARY KEY (owner_id)
);


CREATE SEQUENCE public.cmd_status_status_id_seq;

CREATE TABLE public.cmd_status (
                status_id INTEGER NOT NULL DEFAULT nextval('public.cmd_status_status_id_seq'),
                status VARCHAR NOT NULL,
                CONSTRAINT status_id PRIMARY KEY (status_id)
);


ALTER SEQUENCE public.cmd_status_status_id_seq OWNED BY public.cmd_status.status_id;

CREATE SEQUENCE public.cmd_locations_location_id_seq;

CREATE TABLE public.cmd_locations (
                location_id INTEGER NOT NULL DEFAULT nextval('public.cmd_locations_location_id_seq'),
                location_name VARCHAR NOT NULL,
                location_address VARCHAR NOT NULL,
                CONSTRAINT location_id PRIMARY KEY (location_id)
);


ALTER SEQUENCE public.cmd_locations_location_id_seq OWNED BY public.cmd_locations.location_id;

CREATE SEQUENCE public.cmd_vendors_vend_id_seq;

CREATE TABLE public.cmd_vendors (
                vend_id INTEGER NOT NULL DEFAULT nextval('public.cmd_vendors_vend_id_seq'),
                vend VARCHAR NOT NULL,
                CONSTRAINT vend_id PRIMARY KEY (vend_id)
);


ALTER SEQUENCE public.cmd_vendors_vend_id_seq OWNED BY public.cmd_vendors.vend_id;

CREATE SEQUENCE public.cmd_cabinets_cab_id_seq;

CREATE TABLE public.cmd_cabinets (
                cab_id INTEGER NOT NULL DEFAULT nextval('public.cmd_cabinets_cab_id_seq'),
                location_id INTEGER NOT NULL,
                cab_name VARCHAR NOT NULL,
                cab_units_tot INTEGER NOT NULL,
                cab_image_path VARCHAR,
                CONSTRAINT cab_id PRIMARY KEY (cab_id)
);


ALTER SEQUENCE public.cmd_cabinets_cab_id_seq OWNED BY public.cmd_cabinets.cab_id;

CREATE SEQUENCE public.cmd_contacts_contact_id_seq;

CREATE TABLE public.cmd_contacts (
                contact_id INTEGER NOT NULL DEFAULT nextval('public.cmd_contacts_contact_id_seq'),
                contact_firstname VARCHAR,
                contact_lastname VARCHAR,
                contact_company VARCHAR,
                contact_phone VARCHAR NOT NULL,
                contact_website VARCHAR,
                contact_user VARCHAR,
                contact_pass VARCHAR,
                contact_email VARCHAR NOT NULL,
                contact_address VARCHAR,
                contact_notes VARCHAR,
                CONSTRAINT contact_id PRIMARY KEY (contact_id)
);


ALTER SEQUENCE public.cmd_contacts_contact_id_seq OWNED BY public.cmd_contacts.contact_id;

CREATE SEQUENCE public.cmd_architecture_arch_id_seq;

CREATE TABLE public.cmd_architecture (
                arch_id INTEGER NOT NULL DEFAULT nextval('public.cmd_architecture_arch_id_seq'),
                arch VARCHAR NOT NULL,
                CONSTRAINT arch_id PRIMARY KEY (arch_id)
);


ALTER SEQUENCE public.cmd_architecture_arch_id_seq OWNED BY public.cmd_architecture.arch_id;

CREATE SEQUENCE public.cmd_software_sw_id_seq;

CREATE TABLE public.cmd_software (
                sw_id INTEGER NOT NULL DEFAULT nextval('public.cmd_software_sw_id_seq'),
                software VARCHAR NOT NULL,
                arch_id INTEGER NOT NULL,
                sw_ver VARCHAR NOT NULL,
                vend_id INTEGER NOT NULL,
                CONSTRAINT sw_id PRIMARY KEY (sw_id)
);


ALTER SEQUENCE public.cmd_software_sw_id_seq OWNED BY public.cmd_software.sw_id;

CREATE SEQUENCE public.cmd_os_os_id_seq;

CREATE TABLE public.cmd_os (
                os_id INTEGER NOT NULL DEFAULT nextval('public.cmd_os_os_id_seq'),
                os VARCHAR NOT NULL,
                os_ver VARCHAR NOT NULL,
                arch_id INTEGER,
                CONSTRAINT os_id PRIMARY KEY (os_id)
);


ALTER SEQUENCE public.cmd_os_os_id_seq OWNED BY public.cmd_os.os_id;

CREATE SEQUENCE public.cmd_cpu_type_cpu_type_id_seq;

CREATE TABLE public.cmd_cpu_type (
                cpu_type_id INTEGER NOT NULL DEFAULT nextval('public.cmd_cpu_type_cpu_type_id_seq'),
                vend_id INTEGER NOT NULL,
                cpu_type_model VARCHAR NOT NULL,
                cpu_type_description VARCHAR NOT NULL,
                cpu_type_cores INTEGER NOT NULL,
                CONSTRAINT cpu_type_id PRIMARY KEY (cpu_type_id)
);


ALTER SEQUENCE public.cmd_cpu_type_cpu_type_id_seq OWNED BY public.cmd_cpu_type.cpu_type_id;

CREATE SEQUENCE public.cmd_interface_protocol_int_proto_id_seq;

CREATE TABLE public.cmd_interface_protocol (
                int_proto_id INTEGER NOT NULL DEFAULT nextval('public.cmd_interface_protocol_int_proto_id_seq'),
                int_proto VARCHAR NOT NULL,
                CONSTRAINT int_proto_id PRIMARY KEY (int_proto_id)
);


ALTER SEQUENCE public.cmd_interface_protocol_int_proto_id_seq OWNED BY public.cmd_interface_protocol.int_proto_id;

CREATE SEQUENCE public.cmd_interface_type_int_type_id_seq;

CREATE TABLE public.cmd_interface_type (
                int_type_id INTEGER NOT NULL DEFAULT nextval('public.cmd_interface_type_int_type_id_seq'),
                int_type VARCHAR NOT NULL,
                int_type_desc VARCHAR NOT NULL,
                CONSTRAINT int_type_id PRIMARY KEY (int_type_id)
);


ALTER SEQUENCE public.cmd_interface_type_int_type_id_seq OWNED BY public.cmd_interface_type.int_type_id;

CREATE SEQUENCE public.cmd_disk_type_disk_type_id_seq;

CREATE TABLE public.cmd_disk_type (
                disk_type_id INTEGER NOT NULL DEFAULT nextval('public.cmd_disk_type_disk_type_id_seq'),
                disk_type VARCHAR NOT NULL,
                disk_type_desc VARCHAR NOT NULL,
                CONSTRAINT disk_type_id PRIMARY KEY (disk_type_id)
);


ALTER SEQUENCE public.cmd_disk_type_disk_type_id_seq OWNED BY public.cmd_disk_type.disk_type_id;

CREATE SEQUENCE public.cmd_object_type_obj_type_id_seq;

CREATE TABLE public.cmd_object_type (
                obj_type_id INTEGER NOT NULL DEFAULT nextval('public.cmd_object_type_obj_type_id_seq'),
                obj_type VARCHAR NOT NULL,
                obj_type_desc VARCHAR NOT NULL,
                CONSTRAINT obj_type_id PRIMARY KEY (obj_type_id)
);


ALTER SEQUENCE public.cmd_object_type_obj_type_id_seq OWNED BY public.cmd_object_type.obj_type_id;

CREATE SEQUENCE public.cmd_model_model_id_seq;

CREATE TABLE public.cmd_model (
                model_id INTEGER NOT NULL DEFAULT nextval('public.cmd_model_model_id_seq'),
                model VARCHAR NOT NULL,
                vend_id INTEGER NOT NULL,
                obj_type_id INTEGER NOT NULL,
                CONSTRAINT model_id PRIMARY KEY (model_id)
);


ALTER SEQUENCE public.cmd_model_model_id_seq OWNED BY public.cmd_model.model_id;

CREATE SEQUENCE public.cmd_object_obj_id_seq_1;

CREATE TABLE public.cmd_object (
                obj_id INTEGER NOT NULL DEFAULT nextval('public.cmd_object_obj_id_seq_1'),
                priority_id INTEGER,
                owner_id INTEGER,
                model_id INTEGER,
                status_id INTEGER,
                os_id INTEGER,
                arch_id INTEGER,
                purpose_id INTEGER,
                disk_id INTEGER,
                obj_type_id INTEGER,
                sw_id INTEGER,
                obj_name VARCHAR NOT NULL,
                obj_serial VARCHAR NOT NULL,
                obj_install DATE NOT NULL,
                obj_decom DATE NOT NULL,
                obj_ru_size INTEGER NOT NULL,
                CONSTRAINT obj_id PRIMARY KEY (obj_id)
);


ALTER SEQUENCE public.cmd_object_obj_id_seq_1 OWNED BY public.cmd_object.obj_id;

CREATE INDEX cmd_object_idx
 ON public.cmd_object
 ( priority_id );

CREATE SEQUENCE public.cmd_disk_disk_id_seq;

CREATE TABLE public.cmd_disk (
                disk_id INTEGER NOT NULL DEFAULT nextval('public.cmd_disk_disk_id_seq'),
                disk_type_id INTEGER NOT NULL,
                obj_id INTEGER NOT NULL,
                disk_raid_type_id INTEGER NOT NULL,
                disk_physical_count INTEGER NOT NULL,
                disk_logical_name VARCHAR NOT NULL,
                disk_logical_to_os_dev VARCHAR NOT NULL,
                disk_logical_capacity NUMERIC NOT NULL,
                CONSTRAINT disk_id PRIMARY KEY (disk_id)
);
COMMENT ON COLUMN public.cmd_disk.disk_logical_to_os_dev IS 'Device name of the logical disk presented to the OS.';


ALTER SEQUENCE public.cmd_disk_disk_id_seq OWNED BY public.cmd_disk.disk_id;

CREATE TABLE public.cmd_interfaces (
                int_id INTEGER NOT NULL,
                int_proto_id INTEGER NOT NULL,
                int_type_id INTEGER NOT NULL,
                obj_id INTEGER NOT NULL,
                int_ip VARCHAR NOT NULL,
                CONSTRAINT int_id PRIMARY KEY (int_id)
);


CREATE TABLE public.cmd_connections (
                conn_id INTEGER NOT NULL,
                int_id_1 INTEGER NOT NULL,
                int_id2 INTEGER NOT NULL,
                CONSTRAINT conn_id PRIMARY KEY (conn_id)
);


CREATE TABLE public.cmd_warranty (
                warr_id INTEGER NOT NULL,
                obj_id INTEGER NOT NULL,
                warr_start DATE NOT NULL,
                warr_end DATE NOT NULL,
                CONSTRAINT warr_id PRIMARY KEY (warr_id)
);


CREATE SEQUENCE public.cmd_contact_assigned_contact_ass_id_seq;

CREATE TABLE public.cmd_contact_assigned (
                contact_ass_id INTEGER NOT NULL DEFAULT nextval('public.cmd_contact_assigned_contact_ass_id_seq'),
                obj_id INTEGER NOT NULL,
                contact_id INTEGER NOT NULL,
                CONSTRAINT contact_ass_id PRIMARY KEY (contact_ass_id)
);


ALTER SEQUENCE public.cmd_contact_assigned_contact_ass_id_seq OWNED BY public.cmd_contact_assigned.contact_ass_id;

CREATE TABLE public.cmd_cpu (
                cpu_id INTEGER NOT NULL,
                cpu_type_id INTEGER NOT NULL,
                obj_id INTEGER NOT NULL,
                cpu_slot INTEGER NOT NULL,
                CONSTRAINT cpu_id PRIMARY KEY (cpu_id)
);


CREATE TABLE public.cmd_ram (
                ram_id INTEGER NOT NULL,
                obj_id INTEGER DEFAULT 1 NOT NULL,
                ram_slot INTEGER NOT NULL,
                ram_installed VARCHAR NOT NULL,
                ram_speed VARCHAR NOT NULL,
                CONSTRAINT ram_id PRIMARY KEY (ram_id, obj_id)
);


CREATE TABLE public.cmd_depends (
                depend_id INTEGER NOT NULL,
                obj_id INTEGER DEFAULT 1 NOT NULL,
                obj_id_1 INTEGER NOT NULL,
                CONSTRAINT depend_id PRIMARY KEY (depend_id)
);


CREATE SEQUENCE public.cmd_object_notes_obj_notes_id_seq;

CREATE TABLE public.cmd_object_notes (
                obj_notes_id INTEGER NOT NULL DEFAULT nextval('public.cmd_object_notes_obj_notes_id_seq'),
                obj_id INTEGER NOT NULL,
                obj_notes VARCHAR NOT NULL,
                CONSTRAINT obj_notes_id PRIMARY KEY (obj_notes_id)
);


ALTER SEQUENCE public.cmd_object_notes_obj_notes_id_seq OWNED BY public.cmd_object_notes.obj_notes_id;

CREATE TABLE public.cmd_cab_cont (
                cab_cont_id INTEGER NOT NULL,
                obj_id INTEGER DEFAULT 1 NOT NULL,
                cab_id INTEGER NOT NULL,
                cab_ru_no INTEGER NOT NULL,
                CONSTRAINT cab_cont_id PRIMARY KEY (cab_cont_id)
);


ALTER TABLE public.cmd_disk ADD CONSTRAINT cmd_disk_raid_type_cmd_disk_fk
FOREIGN KEY (disk_raid_type_id)
REFERENCES public.cmd_disk_raid_type (disk_raid_type_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_priority_cmd_object_fk
FOREIGN KEY (priority_id)
REFERENCES public.cmd_priority (priority_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_purpose_cmd_object_fk
FOREIGN KEY (purpose_id)
REFERENCES public.cmd_purpose (purpose_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_owner_cmd_object_fk
FOREIGN KEY (owner_id)
REFERENCES public.cmd_owner (owner_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_status_cmd_object_fk
FOREIGN KEY (status_id)
REFERENCES public.cmd_status (status_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_cabinets ADD CONSTRAINT cmd_locations_cmd_cabinets_fk
FOREIGN KEY (location_id)
REFERENCES public.cmd_locations (location_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_cpu_type ADD CONSTRAINT cmd_vendors_cmd_cpu_type_fk
FOREIGN KEY (vend_id)
REFERENCES public.cmd_vendors (vend_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_software ADD CONSTRAINT cmd_vendors_cmd_software_fk
FOREIGN KEY (vend_id)
REFERENCES public.cmd_vendors (vend_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_cab_cont ADD CONSTRAINT cmd_cabinets_cmd_cab_cont_fk
FOREIGN KEY (cab_id)
REFERENCES public.cmd_cabinets (cab_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_contact_assigned ADD CONSTRAINT cmd_contacts_cmd_contact_assigned_fk
FOREIGN KEY (contact_id)
REFERENCES public.cmd_contacts (contact_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_architecture_cmd_object_fk
FOREIGN KEY (arch_id)
REFERENCES public.cmd_architecture (arch_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_software ADD CONSTRAINT cmd_architecture_cmd_software_fk
FOREIGN KEY (arch_id)
REFERENCES public.cmd_architecture (arch_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_os ADD CONSTRAINT cmd_architecture_cmd_os_fk
FOREIGN KEY (arch_id)
REFERENCES public.cmd_architecture (arch_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_software_cmd_object_fk
FOREIGN KEY (sw_id)
REFERENCES public.cmd_software (sw_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_os_cmd_object_fk
FOREIGN KEY (os_id)
REFERENCES public.cmd_os (os_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.cmd_cpu ADD CONSTRAINT cmd_cpu_type_cmd_cpu_fk
FOREIGN KEY (cpu_type_id)
REFERENCES public.cmd_cpu_type (cpu_type_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_interfaces ADD CONSTRAINT cmd_interface_protocol_cmd_interfaces_fk
FOREIGN KEY (int_proto_id)
REFERENCES public.cmd_interface_protocol (int_proto_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_interfaces ADD CONSTRAINT cmd_interface_type_cmd_interfaces_fk
FOREIGN KEY (int_type_id)
REFERENCES public.cmd_interface_type (int_type_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_disk ADD CONSTRAINT cmd_disk_type_cmd_disk_fk
FOREIGN KEY (disk_type_id)
REFERENCES public.cmd_disk_type (disk_type_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_object_type_cmd_object_fk
FOREIGN KEY (obj_type_id)
REFERENCES public.cmd_object_type (obj_type_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_model ADD CONSTRAINT cmd_object_type_cmd_model_fk
FOREIGN KEY (obj_type_id)
REFERENCES public.cmd_object_type (obj_type_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_model_cmd_object_fk
FOREIGN KEY (model_id)
REFERENCES public.cmd_model (model_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_cab_cont ADD CONSTRAINT cmd_object_cmd_cab_cont_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object_notes ADD CONSTRAINT cmd_object_cmd_object_notes_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_depends ADD CONSTRAINT cmd_object_cmd_depends_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_ram ADD CONSTRAINT cmd_object_cmd_ram_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_cpu ADD CONSTRAINT cmd_object_cmd_cpu_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_contact_assigned ADD CONSTRAINT cmd_object_cmd_contact_assigned_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_warranty ADD CONSTRAINT cmd_object_cmd_warranty_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_interfaces ADD CONSTRAINT cmd_object_cmd_interfaces_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_disk ADD CONSTRAINT cmd_object_cmd_disk_fk
FOREIGN KEY (obj_id)
REFERENCES public.cmd_object (obj_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_object ADD CONSTRAINT cmd_disk_cmd_object_fk
FOREIGN KEY (disk_id)
REFERENCES public.cmd_disk (disk_id)
ON DELETE RESTRICT
ON UPDATE CASCADE
NOT DEFERRABLE;

ALTER TABLE public.cmd_connections ADD CONSTRAINT cmd_interfaces_cmd_connections_fk
FOREIGN KEY (int_id_1)
REFERENCES public.cmd_interfaces (int_id)
ON DELETE CASCADE
ON UPDATE CASCADE
NOT DEFERRABLE;
