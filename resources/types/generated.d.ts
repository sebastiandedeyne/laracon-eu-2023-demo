declare namespace App.Http.Requests {
export type EventRequest = {
name: string;
venue_id: number;
tracks: Array<App.Http.Resources.TrackResource>;
};
}
declare namespace App.Http.Resources {
export type CountryResource = {
id: number;
name: number;
};
export type EventResource = {
id: number;
name: string;
venue: App.Http.Resources.VenueResource;
tracks: Array<App.Http.Resources.TrackResource>;
links: App.Support.Links;
};
export type OptionResource = {
value: string | number;
label: string;
};
export type SessionResource = {
id: number;
name: string;
starts_at: string;
ends_at: string;
};
export type TrackResource = {
id: number;
name: string;
sessions: Array<App.Http.Resources.SessionResource>;
};
export type VenueResource = {
id: number;
name: string;
country: App.Http.Resources.CountryResource;
};
}
declare namespace App.Http.ViewModels.Inertia {
export type EventViewModel = {
method: string;
action: string;
event: App.Http.Resources.EventResource | null;
venues: Array<App.Http.Resources.OptionResource>;
};
export type InertiaViewModel = {
};
}
declare namespace App.Support {
export type Links = {
index: string | null;
create: string | null;
store: string | null;
show: string | null;
edit: string | null;
update: string | null;
destroy: string | null;
};
}
