"use client";

import { NextUIProvider } from "@nextui-org/react";
import { ReactNode } from "react";

export function GlobalProviders({ children }: { children: ReactNode }) {
	return (
		<>
			<NextUIProvider>{children}</NextUIProvider>
		</>
	);
}
